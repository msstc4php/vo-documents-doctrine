# Architecture

Two independent branches, no shared code (`deptrac.yaml`: `Orm` and `Odm` have no rules, so neither may see the other).

- `src/Orm/*Type.php`: `final` subclasses of `MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType` (name the value
  object class and the column length) or `AbstractJsonVoType` (return the codec from `vo-documents`).
- `src/Odm/*Type.php`: the same over `Odm\AbstractStringVoType` / `Odm\AbstractArrayVoType`; no column length.
- `Orm\TypeRegistrar` / `Odm\TypeRegistrar`: `registerAll()` (idempotent) and `types()` (name => class).

All conversion logic lives in `vo-base-doctrine`; this package only binds a value object to a name.

## Completeness guard

`tests/Unit/Contract/EveryDocumentClassHasATypeTest` scans the directory of the installed `vo-documents` sources and
requires, per branch, exactly one registered type for every non-abstract, non-`Internal` class that implements
`ValueObject` (string ones directly; others must have a codec in `Codecs::all()`), and no type for anything else.
A class added to `vo-documents` without a type here fails the suite after the next `composer update`.

Class names are flat and country-prefixed (`RuSnilsType`, `AuNswDriverLicenceNumberType`) because `FamilyName`,
`GivenName` and `PersonName` exist in every `Name\<CC>` namespace. Interfaces, factories, enums (`Jurisdiction`, `Sex`,
`Name\US\NameSuffix`) and `@internal` helper classes (`DE\SerialNumberFormat`, `ES\ControlLetter`, `GB\NhsCheckDigit`)
are not value objects and have no type. So are the abstract bases (`Name\Latin\*`, `Name\RequiredLatin\*`,
`Document\SA\AbstractIdentityNumber`) and the internal helpers added for Asia (`Internal\Gb11643`,
`Internal\KoreanRegistrationNumber`, `Name\JP\PassportHepburn`, `Name\IN\IndianFullName`). The two Indian name
families have distinct types (`vod_in_*` for Latin letters, `vod_in_devanagari_*`). The Chinese, Saudi and Indonesian
driving licences and the Indonesian SIM have no class in `vo-documents`, hence no type.
