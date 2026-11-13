# Known issues

## CI cannot pass until `vo-documents` is published

`composer.json` requires `msstc4php/vo-documents ^0.1` and `composer-ci.json` requires `dev-main as 0.1.0`, both through
a VCS repository on `github.com/msstc4php/vo-documents`. That GitHub repository does not exist yet (the checkout
has only a local `origin`), and `^0.1` also needs a `v0.1.x` tag. Until the owner creates the repository, pushes it and
tags a release, every Composer-based CI job fails at `composer update`. Locally use
`COMPOSER=composer-local.json composer update --ignore-platform-req=php` (path repositories, gitignored profile).

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
