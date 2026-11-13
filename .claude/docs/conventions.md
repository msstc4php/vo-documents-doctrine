# Conventions

- Test method names are camelCase `testXxx`; provider data comes from `tests/Support/Samples.php` (one longest canonical
  sample and one invalid stored value per type), shared by the ORM and ODM suites.
- `#[CoversClass]` lists every type the test executes (`beStrictAboutCoverageMetadata`); the contract test uses `UsesClass`.
- ODM types cannot be built directly (see `vo-base-doctrine`): tests go through `Type::getType($name)` after `register()`.
- Integration tests: ORM runs on in-memory SQLite and builds the `Configuration` by hand (`ORMSetup` needs
  `symfony/cache`, which this package does not require); ODM skips when MongoDB is unreachable.
