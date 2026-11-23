# Changelog

## [1.0.0] - 2026-11-23

First stable release: from here on a breaking change needs 2.0.

**Backward compatibility (full text in the README, "Backward compatibility"):** 1.x covers the type names and
classes, the ORM column lengths (each the frozen `MAX_LENGTH` of its value object) and the stored forms (canonical
strings, codec payloads). A minor adds types and never makes a stored row unreadable. Not covered: exception message
wording, `@internal`.

### Changed

- Requires `msstc4php/vo-documents ^1.0` (was `^0.4`), `msstc4php/vo-base ^1.4` (now explicit: the composite types use
  its `Payload\PayloadCodec`) and `msstc4php/vo-base-doctrine ^1.3` (was `^1.1`).
- Every ORM type's column length is its value object's public `MAX_LENGTH` instead of a literal; the lengths are
  unchanged.
- Composite columns follow the vo-documents 1.0 payloads: the override of the names that derive their Latin form is
  stored under `latinOverride` (was `latin`), the ES and MX surnames under `firstSurname` and `secondSurname` (were
  `first`, `second`). Rows written by 0.x still load.
- `conflict` with `doctrine/dbal <4`, `doctrine/orm <3` and `doctrine/mongodb-odm <2.9`, so an unsupported stack fails
  at install instead of at runtime.
- README: a declared column length does not widen a column (subclass the type instead); one type per jurisdiction
  class (a polymorphic type may come later, additively); install `^1.0`.

### Upgrading from 0.x

- No schema change: type names and column lengths are the same.
- **Install:** the new `conflict` entries refuse `doctrine/dbal <4`, `doctrine/orm <3` and `doctrine/mongodb-odm <2.9`;
  upgrade those first.
- **Composite name columns change text.** Rows written by 0.x keep loading through 1.x, but they are **not** rewritten
  by reading or flushing them: recent ORM 3 releases (3.8 checked) compare the database value of the hydrated name with
  that of the current one (both the 1.0 text), so even assigning an equal new instance writes nothing; ODM writes a field only when it holds
  another instance. Until the rows are migrated, lookups by the stored text miss: a DQL or ODM equality condition on a
  composite column binds the 1.0 text and misses 0.x rows, and JSON-path or ODM field queries on one version's keys
  (`->>'latin'`, `$.first`, `name.first`, `name.latin`) miss the other's rows.
- **Migrate once after upgrading** (ORM): re-encode each composite column through its type with DBAL, which writes
  exactly the text a 1.0 flush would write (tested in `OrmRoundTripTest`):

  ```php
  $type = Type::getType(RuPersonNameType::NAME);
  $platform = $connection->getDatabasePlatform();
  foreach ($connection->iterateAssociative('SELECT id, name FROM person') as $row) {
      $migrated = $type->convertToDatabaseValue($type->convertToPHPValue($row['name'], $platform), $platform);
      if ($migrated !== $row['name']) {
          $connection->update('person', ['name' => $migrated], ['id' => $row['id']]);
      }
  }
  ```

  On a large table, page by id (`WHERE id > :last ORDER BY id LIMIT 1000`) instead of one iteration. Do it per
  composite column (`vod_<cc>_person_name`; the names that derive their Latin form change `latin` to
  `latinOverride`, ES and MX also `first`/`second` to `firstSurname`/`secondSurname`; CN, KR, ID, SA and Devanagari IN
  keep `latin`). A SQL key rename (`jsonb` in PostgreSQL, `JSON_*` in MySQL) fixes JSON-path queries but not equality
  lookups, whose bound text is the codec's own `json_encode()` output. ODM: load each document, assign a new instance
  of the name (for example `$document->name = clone $document->name`) and flush, or `$rename` the sub-document keys
  (`name.latin` to `name.latinOverride`) for field queries.
- Going back to 0.x after 1.x has written rows is not supported: 0.x cannot read the 1.0 keys. Do not run 0.x and 1.x
  on one database side by side.
- See the vo-documents 1.0.0 entry for the API changes of the value objects (enum case names, removed `fromNumber()`
  of partly covered countries, renamed name accessors).

## [0.4.0] - 2026-11-23

### Changed

- Requires `msstc4php/vo-documents ^0.4` (was `^0.3`): vo-documents 0.4.0 lets every framework bridge map the abstract
  `MachineReadableZone` and register the composite-name codecs from one class. No change in this package's code.

## [0.3.0] - 2026-11-23

### Changed

- Requires `msstc4php/vo-documents ^0.3` (was `^0.2`): vo-documents 0.3.0 rebuilds national names through their codec on `unserialize()` and requires vo-base `^1.3`. No change in this package's code.

## [0.2.0] - 2026-11-22

### Added

- ORM and ODM type `vod_icao_mrz` (`IcaoMrzType`) for `Icao\Mrz\MachineReadableZone` (`Td1`, `Td2`, `Td3`), column
  length 92, in both `TypeRegistrar`s (208 types per branch). Needs `msstc4php/vo-documents` 0.2.0, the release with the MRZ,
  so `composer.json` requires `^0.2`. Entity properties are typed as the abstract
  `MachineReadableZone` (a `Td3` property holding a TD1 row is a PHP `TypeError`), see the README.

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
