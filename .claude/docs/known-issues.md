# Known issues

## CI cannot pass until `vo-documents` is published

`composer.json` requires `msstc4php/vo-documents ^0.1` and `composer-ci.json` requires `dev-main as 0.1.0`, both through
a VCS repository on `github.com/msstc4php/vo-documents`. That GitHub repository does not exist yet (the checkout
has only a local `origin`), and `^0.1` also needs a `v0.1.x` tag. Until the owner creates the repository, pushes it and
tags a release, every Composer-based CI job fails at `composer update`. Locally use
`COMPOSER=composer-local.json composer update --ignore-platform-req=php` (path repositories, gitignored profile).

## Name columns are unbounded in the model, bounded in the schema

`Name\*\FamilyName`, `GivenName`, `Patronymic` and `Icao\PersonName` accept any length, but their ORM column is
VARCHAR(255). A longer valid value fails (or is truncated, depending on the platform's strict mode) on write.
`vo-documents` should state a maximum length per name part; then the column can follow it.

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
