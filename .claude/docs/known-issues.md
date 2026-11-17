# Known issues

## CI cannot pass until `vo-documents` is published

`composer.json` requires `msstc4php/vo-documents ^0.1` and `composer-ci.json` requires `dev-main as 0.1.0`, both through
a VCS repository on `github.com/msstc4php/vo-documents`. That GitHub repository does not exist yet (the checkout
has only a local `origin`), and `^0.1` also needs a `v0.1.x` tag. Until the owner creates the repository, pushes it and
tags a release, every Composer-based CI job fails at `composer update`. Locally use
`COMPOSER=composer-local.json composer update --ignore-platform-req=php` (path repositories, gitignored profile).

**Release note (owner):** the bridge maps the DE, FR, IT, ES, NL, CH, GB and TR classes (plan 2), the US, CA, MX and BR
classes (plan 3), the CN, JP, KR, IN, ID and SA classes (plan 4) and the shared `Name\Latin` bases, so its lower bound on `msstc4php/vo-documents` must be the first
tag that contains them. If `v0.1.0` is tagged without them, tag them as `v0.2.0` and raise `composer.json` (and the
`dev-main as …` alias of `composer-ci.json`) to `^0.2` in the same change; otherwise `composer update --prefer-lowest`
resolves a release without the classes and the types fail to load.

## ODM integration test not run locally

No MongoDB server is available in the development sandbox, so `OdmRoundTripTest` is skipped there; it runs in CI
against the `mongo:7` service. Its mapping and hydration were checked offline (metadata load plus hydrator on a
document without a server).

## `ORMSetup` needs `symfony/cache`

`ORMSetup::createAttributeMetadataConfig()` throws without `symfony/cache` or an explicit PSR-6 pool; the integration
test therefore builds `Doctrine\ORM\Configuration` itself.

## Base type wins over the declared column length

`Orm\AbstractStringVoType::getSQLDeclaration()` merges `['length' => $this->columnLength()] + $column`, so the
type's length takes precedence over `#[ORM\Column(length: …)]`.

## Name columns are bounded by decision

100 characters for name parts and 255 for `Icao\PersonName` (`vo-documents` constants); an extremely long real name is
refused by the value object before it reaches the column.

## Open design items (deferred)

- **Polymorphic licence column (not done in plan 3).** There is one type per jurisdiction class; a column that holds
  "any AU licence" needs a composite type storing the jurisdiction and the number (`{jurisdiction: "AU-NSW", number:
  …}`) and rebuilding the class through `DriverLicenceNumberFactory::fromNumberIn()`. US DL/ID, CA licences and health
  cards, MX licences and BR RG have the same need; design it once.
- **Upstream: `vo-base-doctrine` `AbstractJsonVoType` encodes without `JSON_UNESCAPED_UNICODE`**, so a Cyrillic or
  accented name is stored as `\uXXXX` escapes in the JSON column (valid, but larger and not readable in SQL). A
  separate vo-base-doctrine change; nothing to do here.

## Name collation

The README recommends a binary or accent- and case-sensitive collation (MySQL `utf8mb4_bin` / `utf8mb4_0900_as_cs`)
for name columns with a unique index; the types do not set one, because Doctrine collation options are
platform-specific.

- ORM 3.3 (the lowest supported) has no `Configuration::enableNativeLazyObjects()`; the ORM integration test enables
  native lazy objects only on ORM >= 3.4 (checked with `InstalledVersions`, because PHPStan at highest deps reports
  `method_exists` as always true).

- **Latin override equal to the derived form is dropped.** `PersonName::latinOverride()` is `null` when the override
  equals what the name derives, so a sample with such an override stores `latin: null`. Samples must use a differing
  spelling (US and MX allow only transliteration variants: `Müller`/`Jürgen` with `MULLER<<JURGEN`; CA and BR accept
  any ICAO spelling).
- **Ontario version code has its own type** (final review of plan 3, replacing "not persisted"):
  `vod_ca_on_health_card_version_code` (VARCHAR(2)) beside `vod_ca_on_health_card_number`; `OnHealthCard` (the
  `fromCard()` result) is not a `ValueObject`, so the completeness test expects no type for it.
- **Optional parts in the Americas names.** US `given` (and with it `middle`/`suffix`), CA `given` and MX
  `first`/`second` are nullable; BR `given` is required. Required payload keys: US `family`, CA `family`, MX `given`,
  BR `family` and `given` (see `Samples::compositeRequiredKeys()`).
- **Optional given name.** `Name\NL`, `Name\CH` and `Name\GB` `PersonName` accept a null `given`, so `{"family":"X"}`
  is a valid payload for them; the wrong-shape tests use an unknown key (`surname`) instead.
- **Asian names (plan 4).** Required payload keys: CN and KR `family` and `given` (a missing `given` key is refused, a
  null one is a mononym), ID `name` and `latin`, IN `given` (`surname` and `latin` may be absent), JP `family`, `given`,
  `familyReading` and `givenReading`, SA `given` and `latin`. CN, KR, ID, SA and IN-Devanagari store the Latin form
  (required); IN-Latin and JP store only an override (a JP override equal to the derived Hepburn form is dropped, so
  the sample uses `YAMADA<<TAROH`).
- **Same short names in two namespaces.** `Name\IN\GivenName` / `Surname` / `PersonName` and
  `Name\IN\Devanagari\*` get distinct types: `vod_in_given_name` and `vod_in_devanagari_given_name`, class prefix
  `InDevanagari`.
- **Column widths in characters.** CJK, Hangul, Arabic and Devanagari name parts are bounded by `MAX_LENGTH` (100)
  characters, not bytes; VARCHAR(100) is a character count on MySQL and PostgreSQL. `vod_kr_driving_licence_number` is
  VARCHAR(15): the longest stored shape is the old Hangul form `서울 95-255933-61`, the numbered form is 12 digits.
  `vod_id_taxpayer_number` is VARCHAR(16) (stored as 15 or 16 digits, never dotted).
