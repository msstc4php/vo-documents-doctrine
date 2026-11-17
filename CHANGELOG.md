# Changelog

## Unreleased

- ORM and ODM types for every string value object of `msstc4php/vo-documents` (`vod_<cc>_<snake_name>`) and for the
  composite `Name\RU\PersonName` and `Name\AU\PersonName`, with `Orm\TypeRegistrar` and `Odm\TypeRegistrar`.
- ORM and ODM types for the European documents and names (DE, FR, IT, ES, NL, CH, GB, TR): every document number,
  `FamilyName`, `GivenName` and the composite `PersonName` per country.
- ORM and ODM types for the American documents and names (US, CA, MX, BR): every document number (including the 30 US
  DL/ID, 6 Canadian driver licence and 13 Canadian health card classes), `FamilyName`, `GivenName`, the US `MiddleName`
  and the composite `PersonName` per country. `Name\US\NameSuffix` is an enum and gets no type.
- ORM and ODM types for the Asian documents and names (CN, JP, KR, IN, ID, SA): 24 document numbers, the name parts
  (CN, JP, KR, SA; JP readings; ID `FullName`; IN Latin and Devanagari `GivenName`/`Surname`) and the composite
  `PersonName` per country, 48 types per branch. The Indian Devanagari names are `vod_in_devanagari_*`.
- In all, 207 types per branch (ORM and ODM), one per non-abstract `vo-documents` class that is a value object.
  Interfaces, factories and enums (`Jurisdiction`, `Sex`, `Name\US\NameSuffix`) get none.
- `vod_ca_on_health_card_number` stores the ten-digit Ontario health number and `vod_ca_on_health_card_version_code`
  the card's version code (one or two letters); `OnHealthCardNumber::fromCard()` splits a printed card into both.
- `TypeRegistrar::registerAll()` (idempotent) and `types()` (name => class) for Symfony `doctrine.yaml`.
- Name columns are bounded: 100 for name parts, 255 for `Icao\PersonName`, from the `vo-documents` constants.
- Known limits: the ODM integration test needs MongoDB (skipped without it); CI needs the `msstc4php/vo-documents`
  GitHub repository to exist.
