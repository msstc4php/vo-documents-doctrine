# Architecture

Two independent branches, no shared code (`deptrac.yaml`: `Orm` and `Odm` have no rules, so neither may see the other).

- `src/Orm/*Type.php`: `final` subclasses of `MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType` (name the value
  object class and the column length) or `AbstractJsonVoType` (return the codec from `vo-documents`).
- `src/Odm/*Type.php`: the same over `Odm\AbstractStringVoType` / `Odm\AbstractArrayVoType`; no column length.
- `Orm\TypeRegistrar` / `Odm\TypeRegistrar`: `register()` (idempotent) and `types()` (name => class).

All conversion logic lives in `vo-base-doctrine`; this package only binds a value object to a name.

## Completeness guard

`tests/Unit/Contract/EveryDocumentClassHasATypeTest` scans the directory of the installed `vo-documents` sources and
requires, per branch, exactly one registered type for every non-abstract, non-`Internal` class that implements
`ValueObject` (string ones directly; others must have a codec in `Codecs::all()`), and no type for anything else.
A class added to `vo-documents` without a type here fails the suite after the next `composer update`.

Class names are flat and country-prefixed (`RuSnilsType`, `AuNswDriverLicenceNumberType`) because `FamilyName` and
`GivenName` exist in both `Name\RU` and `Name\AU`.
