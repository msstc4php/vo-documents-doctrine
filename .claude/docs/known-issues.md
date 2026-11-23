# Known issues

## Release bounds (1.0)

`composer.json` requires `msstc4php/vo-documents ^1.0`, `vo-base ^1.4` (the composite types use
`Payload\PayloadCodec` directly) and `vo-base-doctrine ^1.3`; `composer-ci.json` aliases `dev-main as 1.0.0`. The
"PHPUnit without optional libraries" CI job installs `composer.json`, so it is red until vo-documents `v1.0.0` is
tagged. `conflict` refuses DBAL < 4, ORM < 3 and ODM < 2.9 at install time (they are dev/suggest dependencies only).
The 0.x sections "CI cannot pass until vo-documents is published" and "stays red until 0.2.0" are obsolete.

## `vod_icao_mrz` maps the abstract class

`IcaoMrzType` names `MachineReadableZone` (abstract); `fromString()` picks `Td1`, `Td2` or `Td3` from the stored lines. Column length 92 = a TD1
(3 lines of 30) plus 2 line breaks. `MachineReadableZone` implements `HasSex` (wave 3 review: `<` is `Sex::Unspecified`) but not `HasBirthDate`;
the types need neither. Entity properties must be typed `MachineReadableZone`: a `Td3`-typed property hydrated from a TD1 row is a PHP
`TypeError` (README; pinned by `testTheMrzTypeRestoresTheFormatOfTheStoredLines`).

## ODM integration test not run locally

No MongoDB server is available in the development sandbox, so `OdmRoundTripTest` is skipped there; it runs in CI
against the `mongo:7` service. Its mapping and hydration were checked offline (metadata load plus hydrator on a
document without a server).

## `ORMSetup` needs `symfony/cache`

`ORMSetup::createAttributeMetadataConfig()` throws without `symfony/cache` or an explicit PSR-6 pool; the integration
test therefore builds `Doctrine\ORM\Configuration` itself.

## Base type wins over the declared column length

`Orm\AbstractStringVoType::getSQLDeclaration()` merges `['length' => $this->columnLength()] + $column`, so the
type's length takes precedence over `#[ORM\Column(length: …)]`. The README says so (since 1.0): widen by subclassing
the type (override `columnLength()`), not through the mapping. Every `columnLength()` returns the value object's public
`MAX_LENGTH` (vo-documents 1.0, frozen); `Samples::stringLengths()` pins the numbers.

## Name columns are bounded by decision

100 characters for name parts and 255 for `Icao\PersonName` (`vo-documents` constants); an extremely long real name is
refused by the value object before it reaches the column.

## Open design items (deferred)

- **Polymorphic licence column (not in 1.0, additive later; the README says so).** There is one type per jurisdiction class; a column that holds
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
  `firstSurname`/`secondSurname` (0.x `first`/`second`) are nullable; BR `given` is required. Required payload keys: US `family`, CA `family`, MX `given`,
  BR `family` and `given` (see `Samples::compositeRequiredKeys()`).
- **Optional given name.** `Name\NL`, `Name\CH` and `Name\GB` `PersonName` accept a null `given`, so `{"family":"X"}`
  is a valid payload for them; the wrong-shape tests use an unknown key (`surname`) instead.
- **Asian names (plan 4).** Required payload keys: CN and KR `family` and `latin` (a missing or null `given` is a name
  stored whole in `family`), ID `name` and `latin`, IN in Latin letters `given` (`surname` and `latin` may be absent),
  IN-Devanagari `given` and `latin` (`surname` may be absent), JP `family`, `given`, `familyReading` and
  `givenReading`, SA `given` and `latin`. CN, KR, ID, SA and IN-Devanagari store the Latin form
  (required, key `latin`); IN-Latin and JP store only an override, key `latinOverride` since 1.0 (a JP override equal to the derived Hepburn form is dropped, so
  the sample uses `YAMADA<<TAROH`).
- **Same short names in two namespaces.** `Name\IN\GivenName` / `Surname` / `PersonName` and
  `Name\IN\Devanagari\*` get distinct types: `vod_in_given_name` and `vod_in_devanagari_given_name`, class prefix
  `InDevanagari`.
- **Column widths in characters.** CJK, Hangul, Arabic and Devanagari name parts are bounded by `MAX_LENGTH` (100)
  characters, not bytes; VARCHAR(100) is a character count on MySQL and PostgreSQL. `vod_kr_driver_licence_number` is
  VARCHAR(15): the longest stored shape is the old Hangul form `서울 95-255933-61`, the numbered form is 12 digits.
  On a byte-counting platform (Oracle `VARCHAR2` with byte semantics) these columns need character semantics or a
  wider column; the README says so.
  `vod_id_taxpayer_number` is VARCHAR(16) (stored as 15 or 16 digits, never dotted).
- **Asian rules that may still change in `vo-documents`.** A stored value is checked again when it is read, so
  tightening or relaxing one of the open decisions of `vo-documents` (JP derived long vowel, IN Aadhaar Verhoeff;
  1.0 relaxed the SA first digit, the KR foreigner birth date and the ID NIK calendar; see its README "Rules that
  may relax") changes which stored rows hydrate.
  Relaxing is safe; tightening needs a major version there.
- **Tightened before 0.1.0 (code review of plan 4).** `vo-documents` now refuses non-letters in CN/KR/JP names (Han
  radicals, Hangzhou numerals, Hangul tone marks, a leading `ー` or iteration mark; `〇` U+3007 stays accepted in CN and
  JP), a Devanagari ZWJ/ZWNJ not after a virama, and folds the Persian kaf/yeh (SA) and `・`/`•` (KR) on parse. Nothing
  was released, so no stored row is affected; a row written by a pre-release build with such a value no longer hydrates
  (folded ones hydrate to the folded value, which differs from the stored text until it is written again).

## 0.x payloads (1.0)

vo-documents 1.0 renamed codec keys: the derived names' override `latin` → `latinOverride`, ES/MX `first`/`second` →
`firstSurname`/`secondSurname`. The codecs read the old keys (`PayloadFields::upgraded()` there), so 0.x rows load;
`Samples::payloadsOf0x()` with literal 0.x payloads pins it for the ORM and ODM types. A row with both an old and a new
key is refused.

**0.x rows are not rewritten by a flush (1.0 review CR-003).** ORM 3.8's `UnitOfWork::isSameConvertedDatabaseValue()`
compares `convertToDatabaseValue()` of the hydrated and the current value: both give the 1.0 text, so even assigning
an equal new instance (or a clone) writes nothing, and the 0.x text stays. ODM 2.17 compares by identity (`===`), so a
new instance is written there. The one-off migration in the CHANGELOG re-encodes each row through the type with DBAL;
`OrmRoundTripTest::testMigrationRecipeRewritesA0xRowWithThe1Point0Keys` pins it, and that a DQL equality lookup misses
the 0.x row before it. A SQL `jsonb` key rename would not fix equality lookups (its text differs from `json_encode()`).
