# Known issues

## CI cannot pass until `vo-documents` is published

`composer.json` requires `msstc4php/vo-documents ^0.1` and `composer-ci.json` requires `dev-main as 0.1.0`, both through
a VCS repository on `github.com/msstc4php/vo-documents`. That GitHub repository does not exist yet (the checkout
has only a local `origin`), and `^0.1` also needs a `v0.1.x` tag. Until the owner creates the repository, pushes it and
tags a release, every Composer-based CI job fails at `composer update`. Locally use
`COMPOSER=composer-local.json composer update --ignore-platform-req=php` (path repositories, gitignored profile).

**Release note (owner):** the bridge maps the DE, FR, IT, ES, NL, CH, GB and TR classes (plan 2) and the shared
`Name\Latin` bases, so its lower bound on `msstc4php/vo-documents` must be the first tag that contains them. If
`v0.1.0` is tagged without them, tag them as `v0.2.0` and raise `composer.json` (and the `dev-main as …` alias of
`composer-ci.json`) to `^0.2` in the same change; otherwise `composer update --prefer-lowest` resolves a release
without the classes and the types fail to load.

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

- **Polymorphic AU licence column (plan 3).** There is one type per jurisdiction class; a column that holds "any AU
  licence" needs a composite type storing the jurisdiction and the number (`{jurisdiction: "AU-NSW", number: …}`) and
  rebuilding the class through `DriverLicenceNumberFactory::fromNumberIn()`. US has the same need; design it once in
  plan 3.
- **Upstream: `vo-base-doctrine` `AbstractJsonVoType` encodes without `JSON_UNESCAPED_UNICODE`**, so a Cyrillic or
  accented name is stored as `\uXXXX` escapes in the JSON column (valid, but larger and not readable in SQL). A
  separate vo-base-doctrine change; nothing to do here.

## Name collation

The README recommends a binary or accent- and case-sensitive collation (MySQL `utf8mb4_bin` / `utf8mb4_0900_as_cs`)
for name columns with a unique index; the types do not set one, because Doctrine collation options are
platform-specific.

- ORM 3.3 (the lowest supported) has no `Configuration::enableNativeLazyObjects()`; the ORM integration test enables native lazy objects only on ORM >= 3.4 (checked with `InstalledVersions`, because PHPStan at highest deps reports `method_exists` as always true).

- **Optional given name.** `Name\NL`, `Name\CH` and `Name\GB` `PersonName` accept a null `given`, so `{"family":"X"}` is a valid
  payload for them; the wrong-shape tests use an unknown key (`surname`) instead.
