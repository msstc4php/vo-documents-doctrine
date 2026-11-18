# Changelog

## [0.1.0] - 2026-11-18

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
  Interfaces, factories and enums (`Jurisdiction`, `Sex`, `Name\US\NameSuffix`, `Document\IN\PanHolderType`) get
  none.
- The composite names of CN, KR, ID, SA and the Devanagari IN store the required Latin form of the passport
  (`latin`); JP and IN in Latin letters store only an override. Document numbers are stored in the folded ASCII form
  (`vo-documents` folds fullwidth and Arabic-Indic digits before parsing), except the Korean driving licence of the
  form issued before 2014-07-02, which keeps its Hangul region name (`서울 95-255933-61`).
- Column lengths count characters (MySQL, PostgreSQL); a platform that counts bytes needs character semantics or a
  wider column for the CJK, Hangul, Arabic and Devanagari names and the old Korean licence (README "Mapping a field").
- The ORM and ODM round-trip tests store the Asian samples (KR licence in Hangul, CN citizen number and name, JP and SA
  names) in SQLite and MongoDB and reload them (the ODM one runs where MongoDB is reachable, as in CI).
- `vod_ca_on_health_card_number` stores the ten-digit Ontario health number and `vod_ca_on_health_card_version_code`
  the card's version code (one or two letters); `OnHealthCardNumber::fromCard()` splits a printed card into both.
- `TypeRegistrar::registerAll()` (idempotent) and `types()` (name => class) for Symfony `doctrine.yaml`.
- Name columns are bounded: 100 for name parts, 255 for `Icao\PersonName`, from the `vo-documents` constants.
- Known limits: the ODM integration test needs MongoDB (skipped without it); CI needs the `msstc4php/vo-documents`
  GitHub repository to exist.
