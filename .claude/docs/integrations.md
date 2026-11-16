# Integrations

Type names are `vod_<cc>_<snake_name>` (`icao` for `Icao\PersonName`); the same names on ORM and ODM.

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
| `vod_icao_person_name` | `Icao\PersonName` | VARCHAR(255) | string |
| `vod_it_family_name` | `Name\IT\FamilyName` | VARCHAR(100) | string |
| `vod_it_fiscal_code` | `Document\IT\FiscalCode` | VARCHAR(16) | string |
| `vod_it_given_name` | `Name\IT\GivenName` | VARCHAR(100) | string |
| `vod_it_passport_number` | `Document\IT\PassportNumber` | VARCHAR(9) | string |
| `vod_it_person_name` | `Name\IT\PersonName` | CLOB (JSON) | sub-document |
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

- Document numbers store the canonical upper-case form as each document defines it (digits, or letters and digits).
  Length = longest canonical form.
- Name parts use `AbstractNamePart::MAX_LENGTH` (100), `Icao\PersonName` uses `Icao\PersonName::MAX_LENGTH` (255); the
  columns reference the constants, so they follow `vo-documents`.
- Composite person names store the codec payload `{family, given, [patronymic,] latin}`; `latin` is only an override,
  the derived Latin form is never stored. The payload shape is fixed by `vo-documents` (extra keys are refused).
- Enums get no type: `#[ORM\Column(enumType: Jurisdiction::class)]` (also `Name\US\NameSuffix`; it travels inside the
  US person name payload as its code, e.g. `JR`).
- The US DL/ID, CA driver-licence and CA health-card interfaces (`DlIdNumber`, `DriverLicenceNumber`,
  `HealthCardNumber`), their factories and the `IdentityCardNumber`/MX `DriverLicenceNumber` interfaces are not types:
  map the jurisdiction-specific class.
- Americas class naming: `<Cc><ShortName>Type`, e.g. `UsAlDlIdNumberType` (`vod_us_al_dl_id_number`),
  `CaOnHealthCardNumberType`, `MxMexDriverLicenceNumberType`, `BrSpIdentityCardNumberType`. US, CA and MX/BR
  `SocialSecurityNumber`/`PassportNumber` types are told apart by the country prefix.
- Stored values are always the canonical `value()` that `from()` accepts back: BC and SK licences, the Brazilian voter
  registration number (12 digits) and similar pad or strip on input, so the column holds the padded form. The
  `SpIdentityCardNumber::fromNumberAndCheckCharacter()` result is stored the same way (`from()` on reload).
- `OnHealthCardNumber` keeps an optional version code outside `value()`; the type stores the number only, so the code is
  lost on reload (documented in the README).
- The AU licence-number interface (`Document\AU\DriverLicenceNumber`) and its factory are not types: map the
  jurisdiction-specific class, or store the string and the `Jurisdiction` enum separately.
