# CLAUDE.md

Guidance for Claude Code in this repository. Deep references live under `.claude/docs/`.

## What this is

`msstc4php/vo-documents-doctrine`: Doctrine ORM and MongoDB ODM types for `msstc4php/vo-documents`
(identity documents and personal names). Built on the abstract types of `msstc4php/vo-base-doctrine`.
PHP >= 8.4. No Symfony dependency; `Orm` and `Odm` never see each other (`deptrac.yaml`).

## Common commands

Local install against the sibling checkouts (`../vo-base`, `../vo-base-doctrine`, `../vo-documents`):
`COMPOSER=composer-local.json composer update --ignore-platform-req=php`. In CI the install is `composer-ci.json`.

- `make check`, `make test`, `make infection`, `make fix`.
- The ODM integration test needs MongoDB (`MONGODB_URI`, default `mongodb://127.0.0.1:27017`) and skips itself otherwise.

## Standard

Tool configuration is byte-identical to the `php84` templates of `msstc4symfony/bundle-standard`; CI's `templates` job
enforces it. Do not edit `.php-cs-fixer.dist.php`, `rector.php`, `phpstan*.neon`, `phpunit.xml.dist`,
`infection.json5`, `Makefile` or `.gitignore` here. The hex layout of that standard does not apply.

## Release order

Tag `vo-documents` first: this bridge's "PHPUnit without optional libraries" CI job installs the bound from `composer.json`
(`^0.3` since 0.3.0, for the names rebuilt on unserialize), so it fails until that `vo-documents` tag exists. A
`vo-documents` minor release always needs a bridge release that raises the bound, since `^0.x` excludes `0.x+1`.

## Adding a class of `vo-documents`

Every non-abstract string value object and every composite with a codec needs one ORM and one ODM type named
`vod_<cc>_<snake_name>`, registered in both `TypeRegistrar`s; `EveryDocumentClassHasATypeTest` fails otherwise.
