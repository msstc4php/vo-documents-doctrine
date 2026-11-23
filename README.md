# msstc4php/vo-documents-doctrine

Doctrine ORM and MongoDB ODM types for [`msstc4php/vo-documents`](https://github.com/msstc4php/vo-documents):
208 types per branch: identity document numbers, name parts, Latin ICAO names, and the composite person name of each
country (RU, AU, DE, FR, IT, ES, NL, CH, GB, TR, US, CA, MX, BR, CN, JP, KR, IN, ID and SA).
Backed enums (`DriverLicenceCategory`, `Jurisdiction`, `Sex`, `Name\US\NameSuffix`, `Document\IN\PanHolderType`) need no
type: map them with `enumType`.

No framework is a runtime dependency. Install the Doctrine stack you actually use; the other branch never loads.
Supported: `doctrine/dbal` 4, `doctrine/orm` 3, `doctrine/mongodb-odm` 2.9+ (older majors conflict at install).

Status: stable since 1.0.0; see "Backward compatibility".

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
        "msstc4php/vo-documents-doctrine": "^1.0"
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

A string type stores the canonical upper-case form as each document defines it (digits, or letters and digits), never
the masked or formatted one. A composite stores the codec payload of the value object: JSON text in an ORM column, a
sub-document in ODM (each type carries its own codec, so no mapper setup is needed). An invalid stored value throws
the value object's own exception, whose message never contains it.

Lengths are counted in characters: a CJK, Hangul, Arabic or Devanagari name part takes up to 100 characters (up to 400
bytes in UTF-8), and the pre-2014 Korean licence (`서울 95-255933-61`, 15 characters) is stored with its Hangul region
name. MySQL and PostgreSQL count VARCHAR in characters; on a platform that counts bytes (Oracle `VARCHAR2` with the
default `NLS_LENGTH_SEMANTICS=BYTE`, SQL Server `varchar`) use character semantics or a Unicode type. A declared
`#[ORM\Column(length: …)]` does not win over the type's length (vo-base-doctrine merges the type's length first, and a
schema diff reverts a manual widening); for a wider column, subclass the type and override `columnLength()`, or
register your own type name.

Each column length is the value object's public `MAX_LENGTH` (`Snils::MAX_LENGTH`, `FamilyName::MAX_LENGTH`), which
vo-documents freezes for 1.x. There is one type per jurisdiction class (`vod_au_nsw_driver_licence_number`, …): a
column that holds "any AU licence" is not provided in 1.0; a polymorphic type (jurisdiction plus number) can be added
later without a break.

Composite payloads are the vo-documents 1.0 codec payloads: the names that derive their Latin form store only an
override, under `latinOverride`; ES and MX store `firstSurname` and `secondSurname`. Rows written by 0.x (with
`latin`, `first`, `second`) still load, but keep their 0.x text until they are migrated (an ORM flush does not rewrite
them), so equality and JSON-key lookups miss them until then: run the one-off migration of the CHANGELOG, "Upgrading
from 0.x". The change is one-way: do not run 0.x and 1.x of the bridge on one database side by side, and do not go back
to 0.x once 1.x has written rows.

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
| `vod_br_cns` | `Document\BR\Cns` | VARCHAR(15) | string |
| `vod_br_cpf` | `Document\BR\Cpf` | VARCHAR(11) | string |
| `vod_br_driver_licence_number` | `Document\BR\DriverLicenceNumber` | VARCHAR(11) | string |
| `vod_br_family_name` | `Name\BR\FamilyName` | VARCHAR(100) | string |
| `vod_br_given_name` | `Name\BR\GivenName` | VARCHAR(100) | string |
| `vod_br_nis` | `Document\BR\Nis` | VARCHAR(11) | string |
| `vod_br_passport_number` | `Document\BR\PassportNumber` | VARCHAR(8) | string |
| `vod_br_person_name` | `Name\BR\PersonName` | CLOB (JSON) | sub-document |
| `vod_br_sp_identity_card_number` | `Document\BR\IdentityCard\SpIdentityCardNumber` | VARCHAR(9) | string |
| `vod_br_voter_registration_number` | `Document\BR\VoterRegistrationNumber` | VARCHAR(12) | string |
| `vod_ca_ab_driver_licence_number` | `Document\CA\DriverLicence\AbDriverLicenceNumber` | VARCHAR(9) | string |
| `vod_ca_ab_health_card_number` | `Document\CA\HealthCard\AbHealthCardNumber` | VARCHAR(9) | string |
| `vod_ca_bc_driver_licence_number` | `Document\CA\DriverLicence\BcDriverLicenceNumber` | VARCHAR(8) | string |
| `vod_ca_bc_health_card_number` | `Document\CA\HealthCard\BcHealthCardNumber` | VARCHAR(10) | string |
| `vod_ca_family_name` | `Name\CA\FamilyName` | VARCHAR(100) | string |
| `vod_ca_given_name` | `Name\CA\GivenName` | VARCHAR(100) | string |
| `vod_ca_mb_health_card_number` | `Document\CA\HealthCard\MbHealthCardNumber` | VARCHAR(9) | string |
| `vod_ca_nb_health_card_number` | `Document\CA\HealthCard\NbHealthCardNumber` | VARCHAR(9) | string |
| `vod_ca_nl_health_card_number` | `Document\CA\HealthCard\NlHealthCardNumber` | VARCHAR(12) | string |
| `vod_ca_ns_driver_licence_number` | `Document\CA\DriverLicence\NsDriverLicenceNumber` | VARCHAR(14) | string |
| `vod_ca_ns_health_card_number` | `Document\CA\HealthCard\NsHealthCardNumber` | VARCHAR(10) | string |
| `vod_ca_nt_health_card_number` | `Document\CA\HealthCard\NtHealthCardNumber` | VARCHAR(8) | string |
| `vod_ca_nu_health_card_number` | `Document\CA\HealthCard\NuHealthCardNumber` | VARCHAR(9) | string |
| `vod_ca_on_driver_licence_number` | `Document\CA\DriverLicence\OnDriverLicenceNumber` | VARCHAR(15) | string |
| `vod_ca_on_health_card_number` | `Document\CA\HealthCard\OnHealthCardNumber` | VARCHAR(10) | string |
| `vod_ca_on_health_card_version_code` | `Document\CA\HealthCard\OnHealthCardVersionCode` | VARCHAR(2) | string |
| `vod_ca_passport_number` | `Document\CA\PassportNumber` | VARCHAR(9) | string |
| `vod_ca_pe_health_card_number` | `Document\CA\HealthCard\PeHealthCardNumber` | VARCHAR(8) | string |
| `vod_ca_person_name` | `Name\CA\PersonName` | CLOB (JSON) | sub-document |
| `vod_ca_qc_driver_licence_number` | `Document\CA\DriverLicence\QcDriverLicenceNumber` | VARCHAR(13) | string |
| `vod_ca_qc_health_card_number` | `Document\CA\HealthCard\QcHealthCardNumber` | VARCHAR(12) | string |
| `vod_ca_sk_driver_licence_number` | `Document\CA\DriverLicence\SkDriverLicenceNumber` | VARCHAR(8) | string |
| `vod_ca_sk_health_card_number` | `Document\CA\HealthCard\SkHealthCardNumber` | VARCHAR(9) | string |
| `vod_ca_social_insurance_number` | `Document\CA\SocialInsuranceNumber` | VARCHAR(9) | string |
| `vod_ca_yt_health_card_number` | `Document\CA\HealthCard\YtHealthCardNumber` | VARCHAR(9) | string |
| `vod_ch_ahv_number` | `Document\CH\AhvNumber` | VARCHAR(13) | string |
| `vod_ch_driver_licence_number` | `Document\CH\DriverLicenceNumber` | VARCHAR(15) | string |
| `vod_ch_family_name` | `Name\CH\FamilyName` | VARCHAR(100) | string |
| `vod_ch_given_name` | `Name\CH\GivenName` | VARCHAR(100) | string |
| `vod_ch_identity_document_number` | `Document\CH\IdentityDocumentNumber` | VARCHAR(8) | string |
| `vod_ch_person_name` | `Name\CH\PersonName` | CLOB (JSON) | sub-document |
| `vod_cn_citizen_identity_number` | `Document\CN\CitizenIdentityNumber` | VARCHAR(18) | string |
| `vod_cn_exit_entry_permit_to_hong_kong_macau_number` | `Document\CN\ExitEntryPermitToHongKongMacauNumber` | VARCHAR(9) | string |
| `vod_cn_exit_entry_permit_to_taiwan_number` | `Document\CN\ExitEntryPermitToTaiwanNumber` | VARCHAR(9) | string |
| `vod_cn_family_name` | `Name\CN\FamilyName` | VARCHAR(100) | string |
| `vod_cn_foreigner_permanent_residence_number` | `Document\CN\ForeignerPermanentResidenceNumber` | VARCHAR(18) | string |
| `vod_cn_given_name` | `Name\CN\GivenName` | VARCHAR(100) | string |
| `vod_cn_legacy_foreigner_permanent_residence_number` | `Document\CN\LegacyForeignerPermanentResidenceNumber` | VARCHAR(15) | string |
| `vod_cn_ordinary_passport_number` | `Document\CN\OrdinaryPassportNumber` | VARCHAR(9) | string |
| `vod_cn_person_name` | `Name\CN\PersonName` | CLOB (JSON) | sub-document |
| `vod_de_family_name` | `Name\DE\FamilyName` | VARCHAR(100) | string |
| `vod_de_given_name` | `Name\DE\GivenName` | VARCHAR(100) | string |
| `vod_de_identity_card_number` | `Document\DE\IdentityCardNumber` | VARCHAR(9) | string |
| `vod_de_passport_number` | `Document\DE\PassportNumber` | VARCHAR(9) | string |
| `vod_de_pension_insurance_number` | `Document\DE\PensionInsuranceNumber` | VARCHAR(12) | string |
| `vod_de_person_name` | `Name\DE\PersonName` | CLOB (JSON) | sub-document |
| `vod_de_tax_identification_number` | `Document\DE\TaxIdentificationNumber` | VARCHAR(11) | string |
| `vod_es_dni` | `Document\ES\Dni` | VARCHAR(9) | string |
| `vod_es_family_name` | `Name\ES\FamilyName` | VARCHAR(100) | string |
| `vod_es_given_name` | `Name\ES\GivenName` | VARCHAR(100) | string |
| `vod_es_nie` | `Document\ES\Nie` | VARCHAR(10) | string |
| `vod_es_person_name` | `Name\ES\PersonName` | CLOB (JSON) | sub-document |
| `vod_es_social_security_number` | `Document\ES\SocialSecurityNumber` | VARCHAR(12) | string |
| `vod_fr_driver_licence_number` | `Document\FR\DriverLicenceNumber` | VARCHAR(12) | string |
| `vod_fr_family_name` | `Name\FR\FamilyName` | VARCHAR(100) | string |
| `vod_fr_given_name` | `Name\FR\GivenName` | VARCHAR(100) | string |
| `vod_fr_legacy_identity_card_number` | `Document\FR\LegacyIdentityCardNumber` | VARCHAR(12) | string |
| `vod_fr_nir` | `Document\FR\Nir` | VARCHAR(15) | string |
| `vod_fr_passport_number` | `Document\FR\PassportNumber` | VARCHAR(9) | string |
| `vod_fr_person_name` | `Name\FR\PersonName` | CLOB (JSON) | sub-document |
| `vod_fr_tax_identification_number` | `Document\FR\TaxIdentificationNumber` | VARCHAR(13) | string |
| `vod_gb_chi_number` | `Document\GB\ChiNumber` | VARCHAR(10) | string |
| `vod_gb_family_name` | `Name\GB\FamilyName` | VARCHAR(100) | string |
| `vod_gb_given_name` | `Name\GB\GivenName` | VARCHAR(100) | string |
| `vod_gb_great_britain_driver_licence_number` | `Document\GB\GreatBritainDriverLicenceNumber` | VARCHAR(16) | string |
| `vod_gb_health_and_care_number` | `Document\GB\HealthAndCareNumber` | VARCHAR(10) | string |
| `vod_gb_national_insurance_number` | `Document\GB\NationalInsuranceNumber` | VARCHAR(9) | string |
| `vod_gb_nhs_number` | `Document\GB\NhsNumber` | VARCHAR(10) | string |
| `vod_gb_northern_ireland_driver_licence_number` | `Document\GB\NorthernIrelandDriverLicenceNumber` | VARCHAR(8) | string |
| `vod_gb_passport_number` | `Document\GB\PassportNumber` | VARCHAR(9) | string |
| `vod_gb_person_name` | `Name\GB\PersonName` | CLOB (JSON) | sub-document |
| `vod_icao_mrz` | `Icao\Mrz\MachineReadableZone` (a `Td1`, `Td2` or `Td3`; the lines joined by `\n`) | VARCHAR(92) | string |
| `vod_icao_person_name` | `Icao\PersonName` | VARCHAR(255) | string |
| `vod_id_family_card_number` | `Document\ID\FamilyCardNumber` | VARCHAR(16) | string |
| `vod_id_full_name` | `Name\ID\FullName` | VARCHAR(100) | string |
| `vod_id_national_identity_number` | `Document\ID\NationalIdentityNumber` | VARCHAR(16) | string |
| `vod_id_person_name` | `Name\ID\PersonName` | CLOB (JSON) | sub-document |
| `vod_id_taxpayer_number` | `Document\ID\TaxpayerNumber` | VARCHAR(16) | string |
| `vod_in_aadhaar_number` | `Document\IN\AadhaarNumber` | VARCHAR(12) | string |
| `vod_in_abha_number` | `Document\IN\AbhaNumber` | VARCHAR(14) | string |
| `vod_in_devanagari_given_name` | `Name\IN\Devanagari\GivenName` | VARCHAR(100) | string |
| `vod_in_devanagari_person_name` | `Name\IN\Devanagari\PersonName` | CLOB (JSON) | sub-document |
| `vod_in_devanagari_surname` | `Name\IN\Devanagari\Surname` | VARCHAR(100) | string |
| `vod_in_given_name` | `Name\IN\GivenName` | VARCHAR(100) | string |
| `vod_in_passport_number` | `Document\IN\PassportNumber` | VARCHAR(8) | string |
| `vod_in_permanent_account_number` | `Document\IN\PermanentAccountNumber` | VARCHAR(10) | string |
| `vod_in_person_name` | `Name\IN\PersonName` | CLOB (JSON) | sub-document |
| `vod_in_surname` | `Name\IN\Surname` | VARCHAR(100) | string |
| `vod_it_family_name` | `Name\IT\FamilyName` | VARCHAR(100) | string |
| `vod_it_fiscal_code` | `Document\IT\FiscalCode` | VARCHAR(16) | string |
| `vod_it_given_name` | `Name\IT\GivenName` | VARCHAR(100) | string |
| `vod_it_passport_number` | `Document\IT\PassportNumber` | VARCHAR(9) | string |
| `vod_it_person_name` | `Name\IT\PersonName` | CLOB (JSON) | sub-document |
| `vod_jp_basic_pension_number` | `Document\JP\BasicPensionNumber` | VARCHAR(10) | string |
| `vod_jp_driver_licence_number` | `Document\JP\DriverLicenceNumber` | VARCHAR(12) | string |
| `vod_jp_family_name` | `Name\JP\FamilyName` | VARCHAR(100) | string |
| `vod_jp_family_name_reading` | `Name\JP\FamilyNameReading` | VARCHAR(100) | string |
| `vod_jp_given_name` | `Name\JP\GivenName` | VARCHAR(100) | string |
| `vod_jp_given_name_reading` | `Name\JP\GivenNameReading` | VARCHAR(100) | string |
| `vod_jp_my_number` | `Document\JP\MyNumber` | VARCHAR(12) | string |
| `vod_jp_passport_number` | `Document\JP\PassportNumber` | VARCHAR(9) | string |
| `vod_jp_person_name` | `Name\JP\PersonName` | CLOB (JSON) | sub-document |
| `vod_jp_residence_card_number` | `Document\JP\ResidenceCardNumber` | VARCHAR(12) | string |
| `vod_kr_driver_licence_number` | `Document\KR\DriverLicenceNumber` | VARCHAR(15) | string |
| `vod_kr_family_name` | `Name\KR\FamilyName` | VARCHAR(100) | string |
| `vod_kr_foreigner_registration_number` | `Document\KR\ForeignerRegistrationNumber` | VARCHAR(13) | string |
| `vod_kr_given_name` | `Name\KR\GivenName` | VARCHAR(100) | string |
| `vod_kr_multiple_entry_passport_number` | `Document\KR\MultipleEntryPassportNumber` | VARCHAR(9) | string |
| `vod_kr_person_name` | `Name\KR\PersonName` | CLOB (JSON) | sub-document |
| `vod_kr_resident_registration_number` | `Document\KR\ResidentRegistrationNumber` | VARCHAR(13) | string |
| `vod_mx_curp` | `Document\MX\Curp` | VARCHAR(18) | string |
| `vod_mx_elector_key` | `Document\MX\ElectorKey` | VARCHAR(18) | string |
| `vod_mx_family_name` | `Name\MX\FamilyName` | VARCHAR(100) | string |
| `vod_mx_given_name` | `Name\MX\GivenName` | VARCHAR(100) | string |
| `vod_mx_mex_driver_licence_number` | `Document\MX\DriverLicence\MexDriverLicenceNumber` | VARCHAR(12) | string |
| `vod_mx_person_name` | `Name\MX\PersonName` | CLOB (JSON) | sub-document |
| `vod_mx_rfc` | `Document\MX\Rfc` | VARCHAR(13) | string |
| `vod_mx_social_security_number` | `Document\MX\SocialSecurityNumber` | VARCHAR(11) | string |
| `vod_nl_bsn` | `Document\NL\Bsn` | VARCHAR(9) | string |
| `vod_nl_family_name` | `Name\NL\FamilyName` | VARCHAR(100) | string |
| `vod_nl_given_name` | `Name\NL\GivenName` | VARCHAR(100) | string |
| `vod_nl_identity_document_number` | `Document\NL\IdentityDocumentNumber` | VARCHAR(9) | string |
| `vod_nl_person_name` | `Name\NL\PersonName` | CLOB (JSON) | sub-document |
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
| `vod_sa_family_name` | `Name\SA\FamilyName` | VARCHAR(100) | string |
| `vod_sa_father_name` | `Name\SA\FatherName` | VARCHAR(100) | string |
| `vod_sa_given_name` | `Name\SA\GivenName` | VARCHAR(100) | string |
| `vod_sa_grandfather_name` | `Name\SA\GrandfatherName` | VARCHAR(100) | string |
| `vod_sa_iqama_number` | `Document\SA\IqamaNumber` | VARCHAR(10) | string |
| `vod_sa_national_identity_number` | `Document\SA\NationalIdentityNumber` | VARCHAR(10) | string |
| `vod_sa_person_name` | `Name\SA\PersonName` | CLOB (JSON) | sub-document |
| `vod_tr_family_name` | `Name\TR\FamilyName` | VARCHAR(100) | string |
| `vod_tr_given_name` | `Name\TR\GivenName` | VARCHAR(100) | string |
| `vod_tr_identity_number` | `Document\TR\IdentityNumber` | VARCHAR(11) | string |
| `vod_tr_passport_number` | `Document\TR\PassportNumber` | VARCHAR(9) | string |
| `vod_tr_person_name` | `Name\TR\PersonName` | CLOB (JSON) | sub-document |
| `vod_us_al_dl_id_number` | `Document\US\DlId\AlDlIdNumber` | VARCHAR(8) | string |
| `vod_us_az_dl_id_number` | `Document\US\DlId\AzDlIdNumber` | VARCHAR(9) | string |
| `vod_us_co_dl_id_number` | `Document\US\DlId\CoDlIdNumber` | VARCHAR(9) | string |
| `vod_us_ct_dl_id_number` | `Document\US\DlId\CtDlIdNumber` | VARCHAR(9) | string |
| `vod_us_family_name` | `Name\US\FamilyName` | VARCHAR(100) | string |
| `vod_us_fl_dl_id_number` | `Document\US\DlId\FlDlIdNumber` | VARCHAR(13) | string |
| `vod_us_given_name` | `Name\US\GivenName` | VARCHAR(100) | string |
| `vod_us_hi_dl_id_number` | `Document\US\DlId\HiDlIdNumber` | VARCHAR(9) | string |
| `vod_us_ia_dl_id_number` | `Document\US\DlId\IaDlIdNumber` | VARCHAR(9) | string |
| `vod_us_id_dl_id_number` | `Document\US\DlId\IdDlIdNumber` | VARCHAR(9) | string |
| `vod_us_il_dl_id_number` | `Document\US\DlId\IlDlIdNumber` | VARCHAR(12) | string |
| `vod_us_in_dl_id_number` | `Document\US\DlId\InDlIdNumber` | VARCHAR(10) | string |
| `vod_us_itin` | `Document\US\Itin` | VARCHAR(9) | string |
| `vod_us_ks_dl_id_number` | `Document\US\DlId\KsDlIdNumber` | VARCHAR(9) | string |
| `vod_us_ky_dl_id_number` | `Document\US\DlId\KyDlIdNumber` | VARCHAR(9) | string |
| `vod_us_ma_dl_id_number` | `Document\US\DlId\MaDlIdNumber` | VARCHAR(9) | string |
| `vod_us_md_dl_id_number` | `Document\US\DlId\MdDlIdNumber` | VARCHAR(13) | string |
| `vod_us_me_dl_id_number` | `Document\US\DlId\MeDlIdNumber` | VARCHAR(7) | string |
| `vod_us_medicare_beneficiary_identifier` | `Document\US\MedicareBeneficiaryIdentifier` | VARCHAR(11) | string |
| `vod_us_mi_dl_id_number` | `Document\US\DlId\MiDlIdNumber` | VARCHAR(13) | string |
| `vod_us_middle_name` | `Name\US\MiddleName` | VARCHAR(100) | string |
| `vod_us_ms_dl_id_number` | `Document\US\DlId\MsDlIdNumber` | VARCHAR(10) | string |
| `vod_us_nd_dl_id_number` | `Document\US\DlId\NdDlIdNumber` | VARCHAR(9) | string |
| `vod_us_ne_dl_id_number` | `Document\US\DlId\NeDlIdNumber` | VARCHAR(9) | string |
| `vod_us_nj_dl_id_number` | `Document\US\DlId\NjDlIdNumber` | VARCHAR(15) | string |
| `vod_us_nm_dl_id_number` | `Document\US\DlId\NmDlIdNumber` | VARCHAR(9) | string |
| `vod_us_ny_dl_id_number` | `Document\US\DlId\NyDlIdNumber` | VARCHAR(9) | string |
| `vod_us_ok_dl_id_number` | `Document\US\DlId\OkDlIdNumber` | VARCHAR(10) | string |
| `vod_us_pa_dl_id_number` | `Document\US\DlId\PaDlIdNumber` | VARCHAR(8) | string |
| `vod_us_passport_book_number` | `Document\US\PassportBookNumber` | VARCHAR(9) | string |
| `vod_us_passport_card_number` | `Document\US\PassportCardNumber` | VARCHAR(9) | string |
| `vod_us_person_name` | `Name\US\PersonName` | CLOB (JSON) | sub-document |
| `vod_us_ri_dl_id_number` | `Document\US\DlId\RiDlIdNumber` | VARCHAR(8) | string |
| `vod_us_social_security_number` | `Document\US\SocialSecurityNumber` | VARCHAR(9) | string |
| `vod_us_tx_dl_id_number` | `Document\US\DlId\TxDlIdNumber` | VARCHAR(8) | string |
| `vod_us_vt_dl_id_number` | `Document\US\DlId\VtDlIdNumber` | VARCHAR(8) | string |
| `vod_us_wa_dl_id_number` | `Document\US\DlId\WaDlIdNumber` | VARCHAR(12) | string |
| `vod_us_wi_dl_id_number` | `Document\US\DlId\WiDlIdNumber` | VARCHAR(14) | string |
| `vod_us_wy_dl_id_number` | `Document\US\DlId\WyDlIdNumber` | VARCHAR(9) | string |

Column lengths: string types use the longest accepted form; name columns use `AbstractNamePart::MAX_LENGTH` (100) for
name parts, `Icao\PersonName::MAX_LENGTH` (255) for the ICAO name and 92 for the MRZ (a TD1: 3 lines of 30 and 2 line
breaks). `vod_icao_mrz` maps the abstract `MachineReadableZone`: it restores the format that fits the stored lines.
Type the entity property as `MachineReadableZone`, not `Td1`, `Td2` or `Td3`: a `Td3` property loaded from a row holding
a TD1 fails with a PHP `TypeError` on hydration, not a domain exception.

**Ontario health card.** The printed card `9876543217 YM` is two value objects: `OnHealthCardNumber::fromCard()`
returns an `OnHealthCard` with `number()` (`vod_ca_on_health_card_number`, the ten digits) and `versionCode()`
(`vod_ca_on_health_card_version_code`, one or two letters, `null` for a card printed without one). Map them to two
columns, the version code nullable; two cards of one person share the number. `OnHealthCard` itself is a plain result,
not a value object, and has no type. `OnHealthCardNumber::from()` refuses the printed form with its version code.

**Collation of name columns with a unique index.** Name parts keep their letter case and diacritics (`Müller` and
`Muller`, `de Vries` and `De Vries` are different names). A case- or accent-insensitive collation makes such names
collide in a unique index, or match each other in a lookup. Give these columns a binary or accent- and case-sensitive
collation: on MySQL `utf8mb4_bin` or `utf8mb4_0900_as_cs`
(`#[ORM\Column(type: 'vod_au_family_name', options: ['collation' => 'utf8mb4_bin'])]`). PostgreSQL's default
deterministic collations already compare exactly.

## Backward compatibility

From 1.0.0 on, a breaking change needs 2.0. The 1.x promise covers the type names (`vod_<cc>_<snake_name>`), the
type classes and their `NAME` constants, the ORM column lengths (each is the frozen `MAX_LENGTH` of its value object)
and the stored forms: the canonical string of a document number and the codec payload of a composite name. A minor
release may add types (a new class in vo-documents gets its type in the same minor) and never makes a stored row
unreadable. A stored value is validated again when it is read, so a vo-documents minor that relaxes a rule only lets
more rows hydrate; tightening one would be a major there.

Not covered: exception message wording, and anything `@internal`.
