# Changelog

## Unreleased

- ORM and ODM types for every string value object of `msstc4php/vo-documents` (`vod_<cc>_<snake_name>`) and for the
  composite `Name\RU\PersonName` and `Name\AU\PersonName`, with `Orm\TypeRegistrar` and `Odm\TypeRegistrar`.
- ORM and ODM types for the European documents and names (DE, FR, IT, ES, NL, CH, GB, TR): every document number,
  `FamilyName`, `GivenName` and the composite `PersonName` per country.
- ORM and ODM types for the American documents and names (US, CA, MX, BR): every document number (including the 30 US
  DL/ID, 6 Canadian driver licence and 13 Canadian health card classes), `FamilyName`, `GivenName`, the US
  `MiddleName` and the composite `PersonName` per country. `Name\US\NameSuffix` is an enum and gets no type.
- `vod_ca_on_health_card_number` stores the ten-digit number only; the optional card version code is not stored.
- `TypeRegistrar::registerAll()` (idempotent) and `types()` (name => class) for Symfony `doctrine.yaml`.
- Name columns are bounded: 100 for name parts, 255 for `Icao\PersonName`, from the `vo-documents` constants.
- Known limits: the ODM integration test needs MongoDB (skipped without it); CI needs the `msstc4php/vo-documents`
  GitHub repository to exist.
