# msstc4php/vo-documents-doctrine

Doctrine ORM and MongoDB ODM types for [`msstc4php/vo-documents`](https://github.com/msstc4php/vo-documents):
25 types per branch (identity document numbers, name parts, Latin ICAO names and two composite person names).
Backed enums (`DriverLicenceCategory`, `Jurisdiction`, `Sex`) need no type: map them with `enumType`.

No framework is a runtime dependency. Install the Doctrine stack you actually use; the other branch never loads.

## Install

None of the packages is on Packagist yet, so register the GitHub repositories:

```json
{
    "repositories": [
        { "type": "vcs", "url": "https://github.com/msstc4php/vo-base" },
        { "type": "vcs", "url": "https://github.com/msstc4php/vo-base-doctrine" },
        { "type": "vcs", "url": "https://github.com/msstc4php/vo-documents" },
        { "type": "vcs", "url": "https://github.com/msstc4php/vo-documents-doctrine" }
    ],
    "require": {
        "msstc4php/vo-documents-doctrine": "^0.1"
    }
}
```

## Registering the types

Without Symfony, once at bootstrap (idempotent, safe in long-running workers):

```php
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TypeRegistrar;

TypeRegistrar::registerAll();
```

With Symfony, map `TypeRegistrar::types()` (name => class) under `doctrine.dbal.types` or
`doctrine_mongodb.types`. `Odm\TypeRegistrar` has the same API and the same names. In `doctrine.yaml`, list the types
you use; `types()` gives the full name => class map:

```yaml
doctrine:
    dbal:
        types:
            vod_ru_snils: MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuSnilsType
            vod_ru_person_name: MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPersonNameType
```

For the ODM use the top-level `doctrine_mongodb: types:` map with the `Odm\` classes in the same way.

## Mapping a field

```php
#[ORM\Column(type: 'vod_ru_snils')]
private Snils $snils;

#[ORM\Column(type: 'vod_ru_person_name')]
private PersonName $name;
```

A string type stores the canonical form (digits only for numbers, upper case for AU licence numbers), never the
masked or formatted one. A composite stores the codec payload of the value object: JSON text in an ORM column, a
sub-document in ODM (each type carries its own codec, so no mapper setup is needed). An invalid stored value throws
the value object's own exception, whose message never contains it.

## Types

| Type name | Value object | ORM column | ODM field |
|---|---|---|---|
| `vod_au_act_driver_licence_number` | `Document\AU\DriverLicence\ActDriverLicenceNumber` | VARCHAR(10) | string |
| `vod_au_family_name` | `Name\AU\FamilyName` | VARCHAR(100) | string |
| `vod_au_given_name` | `Name\AU\GivenName` | VARCHAR(100) | string |
| `vod_au_medicare_card_number` | `Document\AU\MedicareCardNumber` | VARCHAR(10) | string |
| `vod_au_nsw_driver_licence_number` | `Document\AU\DriverLicence\NswDriverLicenceNumber` | VARCHAR(8) | string |
| `vod_au_nt_driver_licence_number` | `Document\AU\DriverLicence\NtDriverLicenceNumber` | VARCHAR(10) | string |
| `vod_au_person_name` | `Name\AU\PersonName` | CLOB (JSON) | sub-document |
| `vod_au_qld_driver_licence_number` | `Document\AU\DriverLicence\QldDriverLicenceNumber` | VARCHAR(9) | string |
| `vod_au_sa_driver_licence_number` | `Document\AU\DriverLicence\SaDriverLicenceNumber` | VARCHAR(6) | string |
| `vod_au_tas_driver_licence_number` | `Document\AU\DriverLicence\TasDriverLicenceNumber` | VARCHAR(8) | string |
| `vod_au_tax_file_number` | `Document\AU\TaxFileNumber` | VARCHAR(9) | string |
| `vod_au_vic_driver_licence_number` | `Document\AU\DriverLicence\VicDriverLicenceNumber` | VARCHAR(10) | string |
| `vod_au_wa_driver_licence_number` | `Document\AU\DriverLicence\WaDriverLicenceNumber` | VARCHAR(7) | string |
| `vod_icao_person_name` | `Icao\PersonName` | VARCHAR(255) | string |
| `vod_ru_driver_licence_number` | `Document\RU\DriverLicenceNumber` | VARCHAR(10) | string |
| `vod_ru_family_name` | `Name\RU\FamilyName` | VARCHAR(100) | string |
| `vod_ru_given_name` | `Name\RU\GivenName` | VARCHAR(100) | string |
| `vod_ru_inn` | `Document\RU\Inn` | VARCHAR(12) | string |
| `vod_ru_internal_passport_number` | `Document\RU\InternalPassportNumber` | VARCHAR(10) | string |
| `vod_ru_international_passport_number` | `Document\RU\InternationalPassportNumber` | VARCHAR(9) | string |
| `vod_ru_oms_policy_number` | `Document\RU\OmsPolicyNumber` | VARCHAR(16) | string |
| `vod_ru_passport_issuing_unit_code` | `Document\RU\PassportIssuingUnitCode` | VARCHAR(6) | string |
| `vod_ru_patronymic` | `Name\RU\Patronymic` | VARCHAR(100) | string |
| `vod_ru_person_name` | `Name\RU\PersonName` | CLOB (JSON) | sub-document |
| `vod_ru_snils` | `Document\RU\Snils` | VARCHAR(11) | string |

Column lengths: string types use the longest accepted form; name columns use `AbstractNamePart::MAX_LENGTH` (100) for
name parts and `Icao\PersonName::MAX_LENGTH` (255) for the ICAO name.

**Collation of name columns with a unique index.** Name parts keep their letter case and diacritics (`Müller` and
`Muller`, `de Vries` and `De Vries` are different names). A case- or accent-insensitive collation makes such names
collide in a unique index, or match each other in a lookup. Give these columns a binary or accent- and case-sensitive
collation: on MySQL `utf8mb4_bin` or `utf8mb4_0900_as_cs`
(`#[ORM\Column(type: 'vod_au_family_name', options: ['collation' => 'utf8mb4_bin'])]`). PostgreSQL's default
deterministic collations already compare exactly.
