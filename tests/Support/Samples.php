<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support;

use MSSTC4PHP\ValueObject\Contract\StringConvertible;
use MSSTC4PHP\ValueObject\Contract\ValueObject;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\ActDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\NswDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\NtDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\QldDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\SaDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\TasDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\VicDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\WaDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\AU\MedicareCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\AU\TaxFileNumber;
use MSSTC4PHP\ValueObject\Documents\Document\BR\Cns as BrCns;
use MSSTC4PHP\ValueObject\Documents\Document\BR\Cpf as BrCpf;
use MSSTC4PHP\ValueObject\Documents\Document\BR\DriverLicenceNumber as BrDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\BR\IdentityCard\SpIdentityCardNumber as BrSpIdentityCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\BR\Nis as BrNis;
use MSSTC4PHP\ValueObject\Documents\Document\BR\PassportNumber as BrPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\BR\VoterRegistrationNumber as BrVoterRegistrationNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\DriverLicence\AbDriverLicenceNumber as CaAbDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\DriverLicence\BcDriverLicenceNumber as CaBcDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\DriverLicence\NsDriverLicenceNumber as CaNsDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\DriverLicence\OnDriverLicenceNumber as CaOnDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\DriverLicence\QcDriverLicenceNumber as CaQcDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\DriverLicence\SkDriverLicenceNumber as CaSkDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\AbHealthCardNumber as CaAbHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\BcHealthCardNumber as CaBcHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\MbHealthCardNumber as CaMbHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\NbHealthCardNumber as CaNbHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\NlHealthCardNumber as CaNlHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\NsHealthCardNumber as CaNsHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\NtHealthCardNumber as CaNtHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\NuHealthCardNumber as CaNuHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\OnHealthCardNumber as CaOnHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\OnHealthCardVersionCode as CaOnHealthCardVersionCode;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\PeHealthCardNumber as CaPeHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\QcHealthCardNumber as CaQcHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\SkHealthCardNumber as CaSkHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\YtHealthCardNumber as CaYtHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\PassportNumber as CaPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\SocialInsuranceNumber as CaSocialInsuranceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CH\AhvNumber as ChAhvNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CH\DriverLicenceNumber as ChDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CH\IdentityDocumentNumber as ChIdentityDocumentNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CN\CitizenIdentityNumber as CnCitizenIdentityNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CN\ExitEntryPermitToHongKongMacauNumber as CnExitEntryPermitToHongKongMacauNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CN\ExitEntryPermitToTaiwanNumber as CnExitEntryPermitToTaiwanNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CN\ForeignerPermanentResidenceNumber as CnForeignerPermanentResidenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CN\LegacyForeignerPermanentResidenceNumber as CnLegacyForeignerPermanentResidenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CN\OrdinaryPassportNumber as CnOrdinaryPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\DE\IdentityCardNumber as DeIdentityCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\DE\PassportNumber as DePassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\DE\PensionInsuranceNumber as DePensionInsuranceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\DE\TaxIdentificationNumber as DeTaxIdentificationNumber;
use MSSTC4PHP\ValueObject\Documents\Document\ES\Dni as EsDni;
use MSSTC4PHP\ValueObject\Documents\Document\ES\Nie as EsNie;
use MSSTC4PHP\ValueObject\Documents\Document\ES\SocialSecurityNumber as EsSocialSecurityNumber;
use MSSTC4PHP\ValueObject\Documents\Document\FR\DriverLicenceNumber as FrDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\FR\LegacyIdentityCardNumber as FrLegacyIdentityCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\FR\Nir as FrNir;
use MSSTC4PHP\ValueObject\Documents\Document\FR\PassportNumber as FrPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\FR\TaxIdentificationNumber as FrTaxIdentificationNumber;
use MSSTC4PHP\ValueObject\Documents\Document\GB\ChiNumber as GbChiNumber;
use MSSTC4PHP\ValueObject\Documents\Document\GB\GreatBritainDriverLicenceNumber as GbGreatBritainDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\GB\HealthAndCareNumber as GbHealthAndCareNumber;
use MSSTC4PHP\ValueObject\Documents\Document\GB\NationalInsuranceNumber as GbNationalInsuranceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\GB\NhsNumber as GbNhsNumber;
use MSSTC4PHP\ValueObject\Documents\Document\GB\NorthernIrelandDriverLicenceNumber as GbNorthernIrelandDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\GB\PassportNumber as GbPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\ID\FamilyCardNumber as IdFamilyCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\ID\NationalIdentityNumber as IdNationalIdentityNumber;
use MSSTC4PHP\ValueObject\Documents\Document\ID\TaxpayerNumber as IdTaxpayerNumber;
use MSSTC4PHP\ValueObject\Documents\Document\IN\AadhaarNumber as InAadhaarNumber;
use MSSTC4PHP\ValueObject\Documents\Document\IN\AbhaNumber as InAbhaNumber;
use MSSTC4PHP\ValueObject\Documents\Document\IN\PassportNumber as InPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\IN\PermanentAccountNumber as InPermanentAccountNumber;
use MSSTC4PHP\ValueObject\Documents\Document\IT\FiscalCode as ItFiscalCode;
use MSSTC4PHP\ValueObject\Documents\Document\IT\PassportNumber as ItPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\JP\BasicPensionNumber as JpBasicPensionNumber;
use MSSTC4PHP\ValueObject\Documents\Document\JP\DriverLicenceNumber as JpDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\JP\MyNumber as JpMyNumber;
use MSSTC4PHP\ValueObject\Documents\Document\JP\PassportNumber as JpPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\JP\ResidenceCardNumber as JpResidenceCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\KR\DriverLicenceNumber as KrDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\KR\ForeignerRegistrationNumber as KrForeignerRegistrationNumber;
use MSSTC4PHP\ValueObject\Documents\Document\KR\MultipleEntryPassportNumber as KrMultipleEntryPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\KR\ResidentRegistrationNumber as KrResidentRegistrationNumber;
use MSSTC4PHP\ValueObject\Documents\Document\MX\Curp as MxCurp;
use MSSTC4PHP\ValueObject\Documents\Document\MX\DriverLicence\MexDriverLicenceNumber as MxMexDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\MX\ElectorKey as MxElectorKey;
use MSSTC4PHP\ValueObject\Documents\Document\MX\Rfc as MxRfc;
use MSSTC4PHP\ValueObject\Documents\Document\MX\SocialSecurityNumber as MxSocialSecurityNumber;
use MSSTC4PHP\ValueObject\Documents\Document\NL\Bsn as NlBsn;
use MSSTC4PHP\ValueObject\Documents\Document\NL\IdentityDocumentNumber as NlIdentityDocumentNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\DriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Inn;
use MSSTC4PHP\ValueObject\Documents\Document\RU\InternalPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\InternationalPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\OmsPolicyNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\PassportIssuingUnitCode;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
use MSSTC4PHP\ValueObject\Documents\Document\SA\IqamaNumber as SaIqamaNumber;
use MSSTC4PHP\ValueObject\Documents\Document\SA\NationalIdentityNumber as SaNationalIdentityNumber;
use MSSTC4PHP\ValueObject\Documents\Document\TR\IdentityNumber as TrIdentityNumber;
use MSSTC4PHP\ValueObject\Documents\Document\TR\PassportNumber as TrPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\AlDlIdNumber as UsAlDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\AzDlIdNumber as UsAzDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\CoDlIdNumber as UsCoDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\CtDlIdNumber as UsCtDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\FlDlIdNumber as UsFlDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\HiDlIdNumber as UsHiDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\IaDlIdNumber as UsIaDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\IdDlIdNumber as UsIdDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\IlDlIdNumber as UsIlDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\InDlIdNumber as UsInDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\KsDlIdNumber as UsKsDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\KyDlIdNumber as UsKyDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\MaDlIdNumber as UsMaDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\MdDlIdNumber as UsMdDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\MeDlIdNumber as UsMeDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\MiDlIdNumber as UsMiDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\MsDlIdNumber as UsMsDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\NdDlIdNumber as UsNdDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\NeDlIdNumber as UsNeDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\NjDlIdNumber as UsNjDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\NmDlIdNumber as UsNmDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\NyDlIdNumber as UsNyDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\OkDlIdNumber as UsOkDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\PaDlIdNumber as UsPaDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\RiDlIdNumber as UsRiDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\TxDlIdNumber as UsTxDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\VtDlIdNumber as UsVtDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\WaDlIdNumber as UsWaDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\WiDlIdNumber as UsWiDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\WyDlIdNumber as UsWyDlIdNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\Itin as UsItin;
use MSSTC4PHP\ValueObject\Documents\Document\US\MedicareBeneficiaryIdentifier as UsMedicareBeneficiaryIdentifier;
use MSSTC4PHP\ValueObject\Documents\Document\US\PassportBookNumber as UsPassportBookNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\PassportCardNumber as UsPassportCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\SocialSecurityNumber as UsSocialSecurityNumber;
use MSSTC4PHP\ValueObject\Documents\Icao\PersonName as IcaoPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\AbstractNamePart;
use MSSTC4PHP\ValueObject\Documents\Name\AU\FamilyName as AuFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\GivenName as AuGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\PersonName as AuPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\BR\FamilyName as BrFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\BR\GivenName as BrGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\BR\PersonName as BrPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\CA\FamilyName as CaFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\CA\GivenName as CaGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\CA\PersonName as CaPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\CH\FamilyName as ChFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\CH\GivenName as ChGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\CH\PersonName as ChPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\CN\FamilyName as CnFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\CN\GivenName as CnGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\CN\PersonName as CnPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\DE\FamilyName as DeFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\DE\GivenName as DeGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\DE\PersonName as DePersonName;
use MSSTC4PHP\ValueObject\Documents\Name\ES\FamilyName as EsFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\ES\GivenName as EsGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\ES\PersonName as EsPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\FR\FamilyName as FrFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\FR\GivenName as FrGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\FR\PersonName as FrPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\GB\FamilyName as GbFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\GB\GivenName as GbGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\GB\PersonName as GbPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\ID\FullName as IdFullName;
use MSSTC4PHP\ValueObject\Documents\Name\ID\PersonName as IdPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\IN\Devanagari\GivenName as InDevanagariGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\IN\Devanagari\PersonName as InDevanagariPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\IN\Devanagari\Surname as InDevanagariSurname;
use MSSTC4PHP\ValueObject\Documents\Name\IN\GivenName as InGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\IN\PersonName as InPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\IN\Surname as InSurname;
use MSSTC4PHP\ValueObject\Documents\Name\IT\FamilyName as ItFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\IT\GivenName as ItGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\IT\PersonName as ItPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\JP\FamilyName as JpFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\JP\FamilyNameReading as JpFamilyNameReading;
use MSSTC4PHP\ValueObject\Documents\Name\JP\GivenName as JpGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\JP\GivenNameReading as JpGivenNameReading;
use MSSTC4PHP\ValueObject\Documents\Name\JP\PersonName as JpPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\KR\FamilyName as KrFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\KR\GivenName as KrGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\KR\PersonName as KrPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\MX\FamilyName as MxFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\MX\GivenName as MxGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\MX\PersonName as MxPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\NL\FamilyName as NlFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\NL\GivenName as NlGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\NL\PersonName as NlPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\FamilyName as RuFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\GivenName as RuGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\Patronymic;
use MSSTC4PHP\ValueObject\Documents\Name\RU\PersonName as RuPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\SA\FamilyName as SaFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\SA\FatherName as SaFatherName;
use MSSTC4PHP\ValueObject\Documents\Name\SA\GivenName as SaGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\SA\GrandfatherName as SaGrandfatherName;
use MSSTC4PHP\ValueObject\Documents\Name\SA\PersonName as SaPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\TR\FamilyName as TrFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\TR\GivenName as TrGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\TR\PersonName as TrPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\US\FamilyName as UsFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\US\GivenName as UsGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\US\MiddleName as UsMiddleName;
use MSSTC4PHP\ValueObject\Documents\Name\US\NameSuffix;
use MSSTC4PHP\ValueObject\Documents\Name\US\PersonName as UsPersonName;

/**
 * A longest canonical sample and a stored value that must be refused, per type name.
 */
final class Samples
{
    private const string BAD_DOCUMENT = 'ZZQQ9!';

    private const string BAD_NAME = 'ZZQQ9';

    /**
     * Per type: the type name, the longest canonical sample, the column length and an invalid stored value.
     *
     * @return iterable<string, array{non-empty-string, StringConvertible, positive-int, non-empty-string}>
     */
    public static function strings(): iterable
    {
        yield 'ru snils' => ['vod_ru_snils', Snils::from('112-233-445 95'), 11, self::BAD_DOCUMENT];
        yield 'ru inn' => ['vod_ru_inn', Inn::from('770700000017'), 12, self::BAD_DOCUMENT];
        yield 'ru oms' => [
            'vod_ru_oms_policy_number',
            OmsPolicyNumber::from('1234567890000007'),
            16,
            self::BAD_DOCUMENT,
        ];
        yield 'ru driver licence' => [
            'vod_ru_driver_licence_number',
            DriverLicenceNumber::from('99 03 123456'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'ru internal passport' => [
            'vod_ru_internal_passport_number',
            InternalPassportNumber::from('45 04 123456'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'ru international passport' => [
            'vod_ru_international_passport_number',
            InternationalPassportNumber::from('75 1234567'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'ru issuing unit code' => [
            'vod_ru_passport_issuing_unit_code',
            PassportIssuingUnitCode::from('770-001'),
            6,
            self::BAD_DOCUMENT,
        ];
        yield 'au medicare' => [
            'vod_au_medicare_card_number',
            MedicareCardNumber::from('2000 00002 0'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'au tfn' => ['vod_au_tax_file_number', TaxFileNumber::from('123 456 009'), 9, self::BAD_DOCUMENT];
        yield 'au act' => [
            'vod_au_act_driver_licence_number',
            ActDriverLicenceNumber::from('1234567890'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'au nsw' => [
            'vod_au_nsw_driver_licence_number',
            NswDriverLicenceNumber::from('AB123456'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'au nt' => [
            'vod_au_nt_driver_licence_number',
            NtDriverLicenceNumber::from('1234567890'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'au qld' => [
            'vod_au_qld_driver_licence_number',
            QldDriverLicenceNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'au sa' => [
            'vod_au_sa_driver_licence_number',
            SaDriverLicenceNumber::from('A12345'),
            6,
            self::BAD_DOCUMENT,
        ];
        yield 'au tas' => [
            'vod_au_tas_driver_licence_number',
            TasDriverLicenceNumber::from('ABC12345'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'au vic' => [
            'vod_au_vic_driver_licence_number',
            VicDriverLicenceNumber::from('1234567890'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'au wa' => [
            'vod_au_wa_driver_licence_number',
            WaDriverLicenceNumber::from('1234567'),
            7,
            self::BAD_DOCUMENT,
        ];
        yield 'ru family name' => [
            'vod_ru_family_name',
            RuFamilyName::from('И' . \str_repeat('в', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'ru given name' => [
            'vod_ru_given_name',
            RuGivenName::from('И' . \str_repeat('в', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'ru patronymic' => [
            'vod_ru_patronymic',
            Patronymic::from('И' . \str_repeat('в', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'au family name' => [
            'vod_au_family_name',
            AuFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'au given name' => [
            'vod_au_given_name',
            AuGivenName::from('J' . \str_repeat('a', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'de identity card number' => [
            'vod_de_identity_card_number',
            DeIdentityCardNumber::from('LZ6311T47'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'de passport number' => [
            'vod_de_passport_number',
            DePassportNumber::from('LZ6311T47'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'de pension insurance number' => [
            'vod_de_pension_insurance_number',
            DePensionInsuranceNumber::from('65230701J008'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'de tax identification number' => [
            'vod_de_tax_identification_number',
            DeTaxIdentificationNumber::from('12345678901'),
            11,
            self::BAD_DOCUMENT,
        ];
        yield 'fr driver licence number' => [
            'vod_fr_driver_licence_number',
            FrDriverLicenceNumber::from('130175102345'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'fr legacy identity card number' => [
            'vod_fr_legacy_identity_card_number',
            FrLegacyIdentityCardNumber::from('880692302345'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'fr nir' => ['vod_fr_nir', FrNir::from('121127713123250'), 15, self::BAD_DOCUMENT];
        yield 'fr passport number' => [
            'vod_fr_passport_number',
            FrPassportNumber::from('12AB34567'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'fr tax identification number' => [
            'vod_fr_tax_identification_number',
            FrTaxIdentificationNumber::from('3023217600053'),
            13,
            self::BAD_DOCUMENT,
        ];
        yield 'it fiscal code' => [
            'vod_it_fiscal_code',
            ItFiscalCode::from('VRDGPP13R10B293P'),
            16,
            self::BAD_DOCUMENT,
        ];
        yield 'it passport number' => [
            'vod_it_passport_number',
            ItPassportNumber::from('YA1234567'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'es dni' => ['vod_es_dni', EsDni::from('12345678Z'), 9, self::BAD_DOCUMENT];
        yield 'es nie' => ['vod_es_nie', EsNie::from('X12345678Z'), 10, self::BAD_DOCUMENT];
        yield 'es social security number' => [
            'vod_es_social_security_number',
            EsSocialSecurityNumber::from('281234565678'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'nl bsn' => ['vod_nl_bsn', NlBsn::from('999990068'), 9, self::BAD_DOCUMENT];
        yield 'nl identity document number' => [
            'vod_nl_identity_document_number',
            NlIdentityDocumentNumber::from('SPECI2024'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'ch ahv number' => ['vod_ch_ahv_number', ChAhvNumber::from('7563047500962'), 13, self::BAD_DOCUMENT];
        yield 'ch driver licence number' => [
            'vod_ch_driver_licence_number',
            ChDriverLicenceNumber::from('000123456789003'),
            15,
            self::BAD_DOCUMENT,
        ];
        yield 'ch identity document number' => [
            'vod_ch_identity_document_number',
            ChIdentityDocumentNumber::from('S1A00A00'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'gb chi number' => ['vod_gb_chi_number', GbChiNumber::from('1203456719'), 10, self::BAD_DOCUMENT];
        yield 'gb great britain driver licence number' => [
            'vod_gb_great_britain_driver_licence_number',
            GbGreatBritainDriverLicenceNumber::from('MORGA657054SM9IJ'),
            16,
            self::BAD_DOCUMENT,
        ];
        yield 'gb health and care number' => [
            'vod_gb_health_and_care_number',
            GbHealthAndCareNumber::from('3456789122'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'gb national insurance number' => [
            'vod_gb_national_insurance_number',
            GbNationalInsuranceNumber::from('AB123456C'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'gb nhs number' => ['vod_gb_nhs_number', GbNhsNumber::from('9434765919'), 10, self::BAD_DOCUMENT];
        yield 'gb northern ireland driver licence number' => [
            'vod_gb_northern_ireland_driver_licence_number',
            GbNorthernIrelandDriverLicenceNumber::from('12345678'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'gb passport number' => [
            'vod_gb_passport_number',
            GbPassportNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'tr identity number' => [
            'vod_tr_identity_number',
            TrIdentityNumber::from('12345678901'),
            11,
            self::BAD_DOCUMENT,
        ];
        yield 'tr passport number' => [
            'vod_tr_passport_number',
            TrPassportNumber::from('U00000261'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'de family name' => [
            'vod_de_family_name',
            DeFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'de given name' => [
            'vod_de_given_name',
            DeGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'fr family name' => [
            'vod_fr_family_name',
            FrFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'fr given name' => [
            'vod_fr_given_name',
            FrGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'it family name' => [
            'vod_it_family_name',
            ItFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'it given name' => [
            'vod_it_given_name',
            ItGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'es family name' => [
            'vod_es_family_name',
            EsFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'es given name' => [
            'vod_es_given_name',
            EsGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'nl family name' => [
            'vod_nl_family_name',
            NlFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'nl given name' => [
            'vod_nl_given_name',
            NlGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'ch family name' => [
            'vod_ch_family_name',
            ChFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'ch given name' => [
            'vod_ch_given_name',
            ChGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'gb family name' => [
            'vod_gb_family_name',
            GbFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'gb given name' => [
            'vod_gb_given_name',
            GbGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'tr family name' => [
            'vod_tr_family_name',
            TrFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'tr given name' => [
            'vod_tr_given_name',
            TrGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'tr family name multibyte' => [
            'vod_tr_family_name',
            TrFamilyName::from('İ' . \str_repeat('ı', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'fr given name multibyte' => [
            'vod_fr_given_name',
            FrGivenName::from('É' . \str_repeat('é', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'br cns' => ['vod_br_cns', BrCns::from('700000000000005'), 15, self::BAD_DOCUMENT];
        yield 'br cpf' => ['vod_br_cpf', BrCpf::from('28001238938'), 11, self::BAD_DOCUMENT];
        yield 'br driver licence number' => [
            'vod_br_driver_licence_number',
            BrDriverLicenceNumber::from('9A04C07DE00'),
            11,
            self::BAD_DOCUMENT,
        ];
        yield 'br sp identity card number' => [
            'vod_br_sp_identity_card_number',
            BrSpIdentityCardNumber::from('24681357X'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'br nis' => ['vod_br_nis', BrNis::from('11816788893'), 11, self::BAD_DOCUMENT];
        yield 'br passport number' => [
            'vod_br_passport_number',
            BrPassportNumber::from('AB123456'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'br voter registration number' => [
            'vod_br_voter_registration_number',
            BrVoterRegistrationNumber::from('000111111111'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'ca ab driver licence number' => [
            'vod_ca_ab_driver_licence_number',
            CaAbDriverLicenceNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'ca bc driver licence number' => [
            'vod_ca_bc_driver_licence_number',
            CaBcDriverLicenceNumber::from('00000050'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'ca ns driver licence number' => [
            'vod_ca_ns_driver_licence_number',
            CaNsDriverLicenceNumber::from('FINCH220867001'),
            14,
            self::BAD_DOCUMENT,
        ];
        yield 'ca on driver licence number' => [
            'vod_ca_on_driver_licence_number',
            CaOnDriverLicenceNumber::from('A12345678901234'),
            15,
            self::BAD_DOCUMENT,
        ];
        yield 'ca qc driver licence number' => [
            'vod_ca_qc_driver_licence_number',
            CaQcDriverLicenceNumber::from('A123456789012'),
            13,
            self::BAD_DOCUMENT,
        ];
        yield 'ca sk driver licence number' => [
            'vod_ca_sk_driver_licence_number',
            CaSkDriverLicenceNumber::from('00000050'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'ca ab health card number' => [
            'vod_ca_ab_health_card_number',
            CaAbHealthCardNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'ca bc health card number' => [
            'vod_ca_bc_health_card_number',
            CaBcHealthCardNumber::from('9012372173'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'ca mb health card number' => [
            'vod_ca_mb_health_card_number',
            CaMbHealthCardNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'ca nb health card number' => [
            'vod_ca_nb_health_card_number',
            CaNbHealthCardNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'ca nl health card number' => [
            'vod_ca_nl_health_card_number',
            CaNlHealthCardNumber::from('123456789012'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'ca ns health card number' => [
            'vod_ca_ns_health_card_number',
            CaNsHealthCardNumber::from('1234567890'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'ca nt health card number' => [
            'vod_ca_nt_health_card_number',
            CaNtHealthCardNumber::from('D1234567'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'ca nu health card number' => [
            'vod_ca_nu_health_card_number',
            CaNuHealthCardNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'ca on health card number' => [
            'vod_ca_on_health_card_number',
            CaOnHealthCardNumber::from('9876543217'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'ca on health card version code' => [
            'vod_ca_on_health_card_version_code',
            CaOnHealthCardVersionCode::from('YM'),
            2,
            self::BAD_DOCUMENT,
        ];
        yield 'ca pe health card number' => [
            'vod_ca_pe_health_card_number',
            CaPeHealthCardNumber::from('12345678'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'ca qc health card number' => [
            'vod_ca_qc_health_card_number',
            CaQcHealthCardNumber::from('YUXJ75021213'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'ca sk health card number' => [
            'vod_ca_sk_health_card_number',
            CaSkHealthCardNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'ca yt health card number' => [
            'vod_ca_yt_health_card_number',
            CaYtHealthCardNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'ca passport number' => [
            'vod_ca_passport_number',
            CaPassportNumber::from('A123456BC'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'ca social insurance number' => [
            'vod_ca_social_insurance_number',
            CaSocialInsuranceNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'mx curp' => ['vod_mx_curp', MxCurp::from('HEGJ561231HDFRRN04'), 18, self::BAD_DOCUMENT];
        yield 'mx mex driver licence number' => [
            'vod_mx_mex_driver_licence_number',
            MxMexDriverLicenceNumber::from('123456789012'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'mx elector key' => [
            'vod_mx_elector_key',
            MxElectorKey::from('GMLPJN56123109H400'),
            18,
            self::BAD_DOCUMENT,
        ];
        yield 'mx rfc' => ['vod_mx_rfc', MxRfc::from('HEGJ5612311A2'), 13, self::BAD_DOCUMENT];
        yield 'mx social security number' => [
            'vod_mx_social_security_number',
            MxSocialSecurityNumber::from('12345678901'),
            11,
            self::BAD_DOCUMENT,
        ];
        yield 'us al dl id number' => [
            'vod_us_al_dl_id_number',
            UsAlDlIdNumber::from('12345678'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'us az dl id number' => [
            'vod_us_az_dl_id_number',
            UsAzDlIdNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us co dl id number' => [
            'vod_us_co_dl_id_number',
            UsCoDlIdNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us ct dl id number' => [
            'vod_us_ct_dl_id_number',
            UsCtDlIdNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us fl dl id number' => [
            'vod_us_fl_dl_id_number',
            UsFlDlIdNumber::from('A123456789012'),
            13,
            self::BAD_DOCUMENT,
        ];
        yield 'us hi dl id number' => [
            'vod_us_hi_dl_id_number',
            UsHiDlIdNumber::from('H12345678'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us ia dl id number' => [
            'vod_us_ia_dl_id_number',
            UsIaDlIdNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us id dl id number' => [
            'vod_us_id_dl_id_number',
            UsIdDlIdNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us il dl id number' => [
            'vod_us_il_dl_id_number',
            UsIlDlIdNumber::from('Y62093057270'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'us in dl id number' => [
            'vod_us_in_dl_id_number',
            UsInDlIdNumber::from('1234567890'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'us ks dl id number' => [
            'vod_us_ks_dl_id_number',
            UsKsDlIdNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us ky dl id number' => [
            'vod_us_ky_dl_id_number',
            UsKyDlIdNumber::from('C12345678'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us ma dl id number' => [
            'vod_us_ma_dl_id_number',
            UsMaDlIdNumber::from('S12345678'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us md dl id number' => [
            'vod_us_md_dl_id_number',
            UsMdDlIdNumber::from('A999999999999'),
            13,
            self::BAD_DOCUMENT,
        ];
        yield 'us me dl id number' => [
            'vod_us_me_dl_id_number',
            UsMeDlIdNumber::from('1234567'),
            7,
            self::BAD_DOCUMENT,
        ];
        yield 'us mi dl id number' => [
            'vod_us_mi_dl_id_number',
            UsMiDlIdNumber::from('A123456789012'),
            13,
            self::BAD_DOCUMENT,
        ];
        yield 'us ms dl id number' => [
            'vod_us_ms_dl_id_number',
            UsMsDlIdNumber::from('123456789A'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'us nd dl id number' => [
            'vod_us_nd_dl_id_number',
            UsNdDlIdNumber::from('ABC123456'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us ne dl id number' => [
            'vod_us_ne_dl_id_number',
            UsNeDlIdNumber::from('C12345678'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us nj dl id number' => [
            'vod_us_nj_dl_id_number',
            UsNjDlIdNumber::from('A12345678901234'),
            15,
            self::BAD_DOCUMENT,
        ];
        yield 'us nm dl id number' => [
            'vod_us_nm_dl_id_number',
            UsNmDlIdNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us ny dl id number' => [
            'vod_us_ny_dl_id_number',
            UsNyDlIdNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us ok dl id number' => [
            'vod_us_ok_dl_id_number',
            UsOkDlIdNumber::from('A123456789'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'us pa dl id number' => [
            'vod_us_pa_dl_id_number',
            UsPaDlIdNumber::from('12345678'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'us ri dl id number' => [
            'vod_us_ri_dl_id_number',
            UsRiDlIdNumber::from('12345678'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'us tx dl id number' => [
            'vod_us_tx_dl_id_number',
            UsTxDlIdNumber::from('12345678'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'us vt dl id number' => [
            'vod_us_vt_dl_id_number',
            UsVtDlIdNumber::from('1234567A'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'us wa dl id number' => [
            'vod_us_wa_dl_id_number',
            UsWaDlIdNumber::from('WDL123456789'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'us wi dl id number' => [
            'vod_us_wi_dl_id_number',
            UsWiDlIdNumber::from('H3001987016204'),
            14,
            self::BAD_DOCUMENT,
        ];
        yield 'us wy dl id number' => [
            'vod_us_wy_dl_id_number',
            UsWyDlIdNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us itin' => ['vod_us_itin', UsItin::from('912701234'), 9, self::BAD_DOCUMENT];
        yield 'us medicare beneficiary identifier' => [
            'vod_us_medicare_beneficiary_identifier',
            UsMedicareBeneficiaryIdentifier::from('1EG4TE5MK73'),
            11,
            self::BAD_DOCUMENT,
        ];
        yield 'us passport book number' => [
            'vod_us_passport_book_number',
            UsPassportBookNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us passport card number' => [
            'vod_us_passport_card_number',
            UsPassportCardNumber::from('C21545427'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'us social security number' => [
            'vod_us_social_security_number',
            UsSocialSecurityNumber::from('123456789'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'br family name' => [
            'vod_br_family_name',
            BrFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'br given name' => [
            'vod_br_given_name',
            BrGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'ca family name' => [
            'vod_ca_family_name',
            CaFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'ca given name' => [
            'vod_ca_given_name',
            CaGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'mx family name' => [
            'vod_mx_family_name',
            MxFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'mx given name' => [
            'vod_mx_given_name',
            MxGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'us family name' => [
            'vod_us_family_name',
            UsFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'us given name' => [
            'vod_us_given_name',
            UsGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'us middle name' => [
            'vod_us_middle_name',
            UsMiddleName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'cn citizen identity number' => [
            'vod_cn_citizen_identity_number',
            CnCitizenIdentityNumber::from('110105199003071239'),
            18,
            self::BAD_DOCUMENT,
        ];
        yield 'cn exit entry permit to hong kong macau number' => [
            'vod_cn_exit_entry_permit_to_hong_kong_macau_number',
            CnExitEntryPermitToHongKongMacauNumber::from('CJ1234567'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'cn exit entry permit to taiwan number' => [
            'vod_cn_exit_entry_permit_to_taiwan_number',
            CnExitEntryPermitToTaiwanNumber::from('T12345678'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'cn foreigner permanent residence number' => [
            'vod_cn_foreigner_permanent_residence_number',
            CnForeignerPermanentResidenceNumber::from('910105199003071238'),
            18,
            self::BAD_DOCUMENT,
        ];
        yield 'cn legacy foreigner permanent residence number' => [
            'vod_cn_legacy_foreigner_permanent_residence_number',
            CnLegacyForeignerPermanentResidenceNumber::from('USA123456789012'),
            15,
            self::BAD_DOCUMENT,
        ];
        yield 'cn ordinary passport number' => [
            'vod_cn_ordinary_passport_number',
            CnOrdinaryPassportNumber::from('EJ1234567'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'id family card number' => [
            'vod_id_family_card_number',
            IdFamilyCardNumber::from('3171234567890001'),
            16,
            self::BAD_DOCUMENT,
        ];
        yield 'id national identity number' => [
            'vod_id_national_identity_number',
            IdNationalIdentityNumber::from('3171010101900001'),
            16,
            self::BAD_DOCUMENT,
        ];
        yield 'id taxpayer number' => [
            'vod_id_taxpayer_number',
            IdTaxpayerNumber::from('0123456789012345'),
            16,
            self::BAD_DOCUMENT,
        ];
        yield 'in aadhaar number' => [
            'vod_in_aadhaar_number',
            InAadhaarNumber::from('234567890124'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'in abha number' => ['vod_in_abha_number', InAbhaNumber::from('12345678901234'), 14, self::BAD_DOCUMENT];
        yield 'in passport number' => [
            'vod_in_passport_number',
            InPassportNumber::from('A1234567'),
            8,
            self::BAD_DOCUMENT,
        ];
        yield 'in permanent account number' => [
            'vod_in_permanent_account_number',
            InPermanentAccountNumber::from('ABCPE1234F'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'jp basic pension number' => [
            'vod_jp_basic_pension_number',
            JpBasicPensionNumber::from('1234567890'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'jp driver licence number' => [
            'vod_jp_driver_licence_number',
            JpDriverLicenceNumber::from('123456789012'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'jp my number' => ['vod_jp_my_number', JpMyNumber::from('123456789018'), 12, self::BAD_DOCUMENT];
        yield 'jp passport number' => [
            'vod_jp_passport_number',
            JpPassportNumber::from('TK1234567'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'jp residence card number' => [
            'vod_jp_residence_card_number',
            JpResidenceCardNumber::from('AB12345678CD'),
            12,
            self::BAD_DOCUMENT,
        ];
        yield 'kr driver licence number' => [
            'vod_kr_driver_licence_number',
            KrDriverLicenceNumber::from('서울 95-255933-61'),
            15,
            self::BAD_DOCUMENT,
        ];
        yield 'kr foreigner registration number' => [
            'vod_kr_foreigner_registration_number',
            KrForeignerRegistrationNumber::from('9001015123456'),
            13,
            self::BAD_DOCUMENT,
        ];
        yield 'kr multiple-entry passport number' => [
            'vod_kr_multiple_entry_passport_number',
            KrMultipleEntryPassportNumber::from('M12345678'),
            9,
            self::BAD_DOCUMENT,
        ];
        yield 'kr resident registration number' => [
            'vod_kr_resident_registration_number',
            KrResidentRegistrationNumber::from('9001011234567'),
            13,
            self::BAD_DOCUMENT,
        ];
        yield 'sa iqama number' => ['vod_sa_iqama_number', SaIqamaNumber::from('2123456789'), 10, self::BAD_DOCUMENT];
        yield 'sa national identity number' => [
            'vod_sa_national_identity_number',
            SaNationalIdentityNumber::from('1123456789'),
            10,
            self::BAD_DOCUMENT,
        ];
        yield 'cn family name' => [
            'vod_cn_family_name',
            CnFamilyName::from('王' . \str_repeat('小', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'cn given name' => [
            'vod_cn_given_name',
            CnGivenName::from('王' . \str_repeat('小', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'id full name' => [
            'vod_id_full_name',
            IdFullName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'in given name' => [
            'vod_in_given_name',
            InGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'in surname' => [
            'vod_in_surname',
            InSurname::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'in devanagari given name' => [
            'vod_in_devanagari_given_name',
            InDevanagariGivenName::from('अ' . \str_repeat('म', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'in devanagari surname' => [
            'vod_in_devanagari_surname',
            InDevanagariSurname::from('अ' . \str_repeat('म', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'jp family name' => [
            'vod_jp_family_name',
            JpFamilyName::from('山' . \str_repeat('田', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'jp given name' => [
            'vod_jp_given_name',
            JpGivenName::from('太' . \str_repeat('郎', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'jp family name reading' => [
            'vod_jp_family_name_reading',
            JpFamilyNameReading::from('ヤ' . \str_repeat('マ', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'jp given name reading' => [
            'vod_jp_given_name_reading',
            JpGivenNameReading::from('た' . \str_repeat('ろ', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'kr family name' => [
            'vod_kr_family_name',
            KrFamilyName::from('김' . \str_repeat('김', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'kr given name' => [
            'vod_kr_given_name',
            KrGivenName::from('민' . \str_repeat('수', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'sa given name' => [
            'vod_sa_given_name',
            SaGivenName::from('م' . \str_repeat('ح', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'sa father name' => [
            'vod_sa_father_name',
            SaFatherName::from('م' . \str_repeat('ح', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'sa grandfather name' => [
            'vod_sa_grandfather_name',
            SaGrandfatherName::from('م' . \str_repeat('ح', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'sa family name' => [
            'vod_sa_family_name',
            SaFamilyName::from('م' . \str_repeat('ح', AbstractNamePart::MAX_LENGTH - 1)),
            AbstractNamePart::MAX_LENGTH,
            self::BAD_NAME,
        ];
        yield 'icao person name' => [
            'vod_icao_person_name',
            IcaoPersonName::from(\str_repeat('A', 127) . '<<' . \str_repeat('B', IcaoPersonName::MAX_LENGTH - 129)),
            IcaoPersonName::MAX_LENGTH,
            self::BAD_NAME,
        ];
    }

    /**
     * @return iterable<string, array{non-empty-string, ValueObject, array<string, string|null>}>
     *                                                                                            type name, value
     *                                                                                            object, its expected
     *                                                                                            payload
     */
    public static function composites(): iterable
    {
        yield 'ru person name' => [
            'vod_ru_person_name',
            new RuPersonName(RuFamilyName::from('Иванов'), RuGivenName::from('Иван'), Patronymic::from('Иванович')),
            ['family' => 'Иванов', 'given' => 'Иван', 'patronymic' => 'Иванович', 'latin' => null],
        ];
        yield 'ru person name with latin override' => [
            'vod_ru_person_name',
            new RuPersonName(
                RuFamilyName::from('Иванов'),
                RuGivenName::from('Иван'),
                Patronymic::from('Иванович'),
                IcaoPersonName::from('IVANOV<<IVAN<IVANOVICH'),
            ),
            ['family' => 'Иванов', 'given' => 'Иван', 'patronymic' => 'Иванович', 'latin' => 'IVANOV<<IVAN<IVANOVICH'],
        ];
        yield 'au person name' => [
            'vod_au_person_name',
            new AuPersonName(AuFamilyName::from('Smith'), AuGivenName::from('Jane')),
            ['family' => 'Smith', 'given' => 'Jane', 'latin' => null],
        ];
        yield 'au person name with latin override' => [
            'vod_au_person_name',
            new AuPersonName(
                AuFamilyName::from('Müller'),
                AuGivenName::from('Zoë'),
                IcaoPersonName::from('MULLER<<ZOE'),
            ),
            ['family' => 'Müller', 'given' => 'Zoë', 'latin' => 'MULLER<<ZOE'],
        ];
        yield 'de person name' => [
            'vod_de_person_name',
            new DePersonName(DeFamilyName::from('Müller'), DeGivenName::from('Hans')),
            ['family' => 'Müller', 'given' => 'Hans', 'latin' => null],
        ];
        yield 'fr person name' => [
            'vod_fr_person_name',
            new FrPersonName(FrFamilyName::from('Dupont'), FrGivenName::from('Jean')),
            ['family' => 'Dupont', 'given' => 'Jean', 'latin' => null],
        ];
        yield 'it person name' => [
            'vod_it_person_name',
            new ItPersonName(ItFamilyName::from('Rossi'), ItGivenName::from('Mario')),
            ['family' => 'Rossi', 'given' => 'Mario', 'latin' => null],
        ];
        yield 'es person name' => [
            'vod_es_person_name',
            new EsPersonName(EsFamilyName::from('García'), null, EsGivenName::from('Ana')),
            ['first' => 'García', 'second' => null, 'given' => 'Ana', 'latin' => null],
        ];
        yield 'nl person name' => [
            'vod_nl_person_name',
            new NlPersonName(NlFamilyName::from('van der Berg'), NlGivenName::from('Jan')),
            ['family' => 'van der Berg', 'given' => 'Jan', 'latin' => null],
        ];
        yield 'ch person name' => [
            'vod_ch_person_name',
            new ChPersonName(ChFamilyName::from('Meier'), ChGivenName::from('Anna')),
            ['family' => 'Meier', 'given' => 'Anna', 'latin' => null],
        ];
        yield 'gb person name' => [
            'vod_gb_person_name',
            new GbPersonName(GbFamilyName::from('Smith'), GbGivenName::from('John')),
            ['family' => 'Smith', 'given' => 'John', 'latin' => null],
        ];
        yield 'tr person name' => [
            'vod_tr_person_name',
            new TrPersonName(TrFamilyName::from('Yılmaz'), TrGivenName::from('Ayşe')),
            ['family' => 'Yılmaz', 'given' => 'Ayşe', 'latin' => null],
        ];
        yield 'de person name with latin override' => [
            'vod_de_person_name',
            new DePersonName(
                DeFamilyName::from('Müller'),
                DeGivenName::from('Jürgen'),
                IcaoPersonName::from('MULLER<<JURGEN'),
            ),
            ['family' => 'Müller', 'given' => 'Jürgen', 'latin' => 'MULLER<<JURGEN'],
        ];
        yield 'fr person name with latin override' => [
            'vod_fr_person_name',
            new FrPersonName(
                FrFamilyName::from('Müller'),
                FrGivenName::from('Joël'),
                IcaoPersonName::from('MULLER<<JOEL'),
            ),
            ['family' => 'Müller', 'given' => 'Joël', 'latin' => 'MULLER<<JOEL'],
        ];
        yield 'it person name with latin override' => [
            'vod_it_person_name',
            new ItPersonName(
                ItFamilyName::from('Müller'),
                ItGivenName::from('Anna'),
                IcaoPersonName::from('MULLER<<ANNA'),
            ),
            ['family' => 'Müller', 'given' => 'Anna', 'latin' => 'MULLER<<ANNA'],
        ];
        yield 'es person name with second surname and latin override' => [
            'vod_es_person_name',
            new EsPersonName(
                EsFamilyName::from('Argüelles'),
                EsFamilyName::from('López'),
                EsGivenName::from('Ana'),
                IcaoPersonName::from('ARGUELLES<LOPEZ<<ANA'),
            ),
            ['first' => 'Argüelles', 'second' => 'López', 'given' => 'Ana', 'latin' => 'ARGUELLES<LOPEZ<<ANA'],
        ];
        yield 'nl person name with one name' => [
            'vod_nl_person_name',
            new NlPersonName(NlFamilyName::from('van der Berg'), null),
            ['family' => 'van der Berg', 'given' => null, 'latin' => null],
        ];
        yield 'nl person name with latin override' => [
            'vod_nl_person_name',
            new NlPersonName(
                NlFamilyName::from('Müller'),
                NlGivenName::from('Anna'),
                IcaoPersonName::from('MULLER<<ANNA'),
            ),
            ['family' => 'Müller', 'given' => 'Anna', 'latin' => 'MULLER<<ANNA'],
        ];
        yield 'ch person name without given name and with latin override' => [
            'vod_ch_person_name',
            new ChPersonName(ChFamilyName::from('Müller'), null, IcaoPersonName::from('MULLER')),
            ['family' => 'Müller', 'given' => null, 'latin' => 'MULLER'],
        ];
        yield 'gb person name with one name' => [
            'vod_gb_person_name',
            new GbPersonName(GbFamilyName::from('Smith'), null),
            ['family' => 'Smith', 'given' => null, 'latin' => null],
        ];
        yield 'gb person name with latin override' => [
            'vod_gb_person_name',
            new GbPersonName(
                GbFamilyName::from('Smith'),
                GbGivenName::from('John'),
                IcaoPersonName::from('SMYTH<<JOHN'),
            ),
            ['family' => 'Smith', 'given' => 'John', 'latin' => 'SMYTH<<JOHN'],
        ];
        yield 'tr person name with latin override' => [
            'vod_tr_person_name',
            new TrPersonName(
                TrFamilyName::from('Öztürk'),
                TrGivenName::from('Ayşe'),
                IcaoPersonName::from('OZTURK<<AYSE'),
            ),
            ['family' => 'Öztürk', 'given' => 'Ayşe', 'latin' => 'OZTURK<<AYSE'],
        ];
        yield 'us person name' => [
            'vod_us_person_name',
            new UsPersonName(
                UsFamilyName::from('Smith'),
                UsGivenName::from('Jane'),
                UsMiddleName::from('Quinn'),
                NameSuffix::Junior,
            ),
            ['family' => 'Smith', 'given' => 'Jane', 'middle' => 'Quinn', 'suffix' => 'JR', 'latin' => null],
        ];
        yield 'us person name with one name' => [
            'vod_us_person_name',
            new UsPersonName(UsFamilyName::from('Smith'), null),
            ['family' => 'Smith', 'given' => null, 'middle' => null, 'suffix' => null, 'latin' => null],
        ];
        yield 'us person name with latin override' => [
            'vod_us_person_name',
            new UsPersonName(
                UsFamilyName::from('Müller'),
                UsGivenName::from('Jürgen'),
                null,
                null,
                IcaoPersonName::from('MULLER<<JURGEN'),
            ),
            [
                'family' => 'Müller',
                'given' => 'Jürgen',
                'middle' => null,
                'suffix' => null,
                'latin' => 'MULLER<<JURGEN',
            ],
        ];
        yield 'ca person name' => [
            'vod_ca_person_name',
            new CaPersonName(CaFamilyName::from('Tremblay'), CaGivenName::from('Marie')),
            ['family' => 'Tremblay', 'given' => 'Marie', 'latin' => null],
        ];
        yield 'ca person name without given name' => [
            'vod_ca_person_name',
            new CaPersonName(CaFamilyName::from('Tremblay'), null),
            ['family' => 'Tremblay', 'given' => null, 'latin' => null],
        ];
        yield 'ca person name with latin override' => [
            'vod_ca_person_name',
            new CaPersonName(
                CaFamilyName::from('Bélanger'),
                CaGivenName::from('Étienne'),
                IcaoPersonName::from('BELLANGER<<ETIENNE'),
            ),
            ['family' => 'Bélanger', 'given' => 'Étienne', 'latin' => 'BELLANGER<<ETIENNE'],
        ];
        yield 'mx person name' => [
            'vod_mx_person_name',
            new MxPersonName(MxFamilyName::from('García'), MxFamilyName::from('López'), MxGivenName::from('María')),
            ['first' => 'García', 'second' => 'López', 'given' => 'María', 'latin' => null],
        ];
        yield 'mx person name without first surname' => [
            'vod_mx_person_name',
            new MxPersonName(null, null, MxGivenName::from('Juan')),
            ['first' => null, 'second' => null, 'given' => 'Juan', 'latin' => null],
        ];
        yield 'mx person name with latin override' => [
            'vod_mx_person_name',
            new MxPersonName(
                MxFamilyName::from('Müller'),
                null,
                MxGivenName::from('Jürgen'),
                IcaoPersonName::from('MULLER<<JURGEN'),
            ),
            ['first' => 'Müller', 'second' => null, 'given' => 'Jürgen', 'latin' => 'MULLER<<JURGEN'],
        ];
        yield 'br person name' => [
            'vod_br_person_name',
            new BrPersonName(BrFamilyName::from('Silva'), BrGivenName::from('João')),
            ['family' => 'Silva', 'given' => 'João', 'latin' => null],
        ];
        yield 'br person name with latin override' => [
            'vod_br_person_name',
            new BrPersonName(
                BrFamilyName::from('Gonçalves'),
                BrGivenName::from('João'),
                IcaoPersonName::from('GONSALVES<<JOAO'),
            ),
            ['family' => 'Gonçalves', 'given' => 'João', 'latin' => 'GONSALVES<<JOAO'],
        ];
        yield 'cn person name' => [
            'vod_cn_person_name',
            new CnPersonName(CnFamilyName::from('王'), CnGivenName::from('小明'), IcaoPersonName::from('WANG<<XIAOMING')),
            ['family' => '王', 'given' => '小明', 'latin' => 'WANG<<XIAOMING'],
        ];
        yield 'cn person name without given name' => [
            'vod_cn_person_name',
            new CnPersonName(CnFamilyName::from('王'), null, IcaoPersonName::from('WANG')),
            ['family' => '王', 'given' => null, 'latin' => 'WANG'],
        ];
        yield 'id person name' => [
            'vod_id_person_name',
            new IdPersonName(IdFullName::from('Budi Santoso'), IcaoPersonName::from('SANTOSO<<BUDI')),
            ['name' => 'Budi Santoso', 'latin' => 'SANTOSO<<BUDI'],
        ];
        yield 'in person name' => [
            'vod_in_person_name',
            new InPersonName(InGivenName::from('Anil'), InSurname::from('Kumar')),
            ['given' => 'Anil', 'surname' => 'Kumar', 'latin' => null],
        ];
        yield 'in person name without surname' => [
            'vod_in_person_name',
            new InPersonName(InGivenName::from('Anil')),
            ['given' => 'Anil', 'surname' => null, 'latin' => null],
        ];
        yield 'in devanagari person name' => [
            'vod_in_devanagari_person_name',
            new InDevanagariPersonName(
                InDevanagariGivenName::from('अनिल'),
                InDevanagariSurname::from('कुमार'),
                IcaoPersonName::from('KUMAR<<ANIL'),
            ),
            ['given' => 'अनिल', 'surname' => 'कुमार', 'latin' => 'KUMAR<<ANIL'],
        ];
        yield 'jp person name' => [
            'vod_jp_person_name',
            new JpPersonName(
                JpFamilyName::from('山田'),
                JpGivenName::from('太郎'),
                JpFamilyNameReading::from('ヤマダ'),
                JpGivenNameReading::from('タロウ'),
            ),
            ['family' => '山田', 'given' => '太郎', 'familyReading' => 'ヤマダ', 'givenReading' => 'タロウ', 'latin' => null],
        ];
        yield 'jp person name with latin override' => [
            'vod_jp_person_name',
            new JpPersonName(
                JpFamilyName::from('山田'),
                JpGivenName::from('太郎'),
                JpFamilyNameReading::from('ヤマダ'),
                JpGivenNameReading::from('タロウ'),
                IcaoPersonName::from('YAMADA<<TAROH'),
            ),
            [
                'family' => '山田',
                'given' => '太郎',
                'familyReading' => 'ヤマダ',
                'givenReading' => 'タロウ',
                'latin' => 'YAMADA<<TAROH',
            ],
        ];
        yield 'kr person name' => [
            'vod_kr_person_name',
            new KrPersonName(KrFamilyName::from('김'), KrGivenName::from('민수'), IcaoPersonName::from('KIM<<MINSU')),
            ['family' => '김', 'given' => '민수', 'latin' => 'KIM<<MINSU'],
        ];
        yield 'sa person name' => [
            'vod_sa_person_name',
            new SaPersonName(
                SaGivenName::from('محمد'),
                SaFatherName::from('أحمد'),
                SaGrandfatherName::from('علي'),
                SaFamilyName::from('العتيبي'),
                IcaoPersonName::from('ALOTAIBI<<MOHAMMED<AHMED<ALI'),
            ),
            [
                'given' => 'محمد',
                'father' => 'أحمد',
                'grandfather' => 'علي',
                'family' => 'العتيبي',
                'latin' => 'ALOTAIBI<<MOHAMMED<AHMED<ALI',
            ],
        ];
        yield 'sa person name with given name only' => [
            'vod_sa_person_name',
            new SaPersonName(SaGivenName::from('محمد'), null, null, null, IcaoPersonName::from('MOHAMMED')),
            ['given' => 'محمد', 'father' => null, 'grandfather' => null, 'family' => null, 'latin' => 'MOHAMMED'],
        ];
    }

    /**
     * Per required key of a composite payload: the type name, a payload that has the key, and the key to remove.
     *
     * @return iterable<string, array{non-empty-string, array<string, string|null>, non-empty-string}>
     */
    public static function compositeRequiredKeys(): iterable
    {
        $required = [
            'vod_ru_person_name' => ['family', 'given'],
            'vod_es_person_name' => ['first', 'given'],
            'vod_nl_person_name' => ['family'],
            'vod_ch_person_name' => ['family'],
            'vod_gb_person_name' => ['family'],
            'vod_us_person_name' => ['family'],
            'vod_ca_person_name' => ['family'],
            'vod_mx_person_name' => ['given'],
            'vod_id_person_name' => ['name', 'latin'],
            'vod_in_person_name' => ['given'],
            'vod_in_devanagari_person_name' => ['given'],
            'vod_jp_person_name' => ['family', 'given', 'familyReading', 'givenReading'],
            'vod_sa_person_name' => ['given', 'latin'],
            'vod_cn_person_name' => ['family', 'latin'],
            'vod_kr_person_name' => ['family', 'latin'],
        ];
        foreach (self::composites() as $label => [$name, , $payload]) {
            foreach ($required[$name] ?? ['family', 'given'] as $key) {
                yield $label . ', without ' . $key => [$name, $payload, $key];
            }
        }
    }

    /**
     * @return iterable<string, array{non-empty-string}>
     */
    public static function stringNames(): iterable
    {
        foreach (self::strings() as $label => [$name]) {
            yield $label => [$name];
        }
    }

    /**
     * @return iterable<string, array{non-empty-string, StringConvertible}>
     */
    public static function stringPairs(): iterable
    {
        foreach (self::strings() as $label => [$name, $vo]) {
            yield $label => [$name, $vo];
        }

        yield 'id taxpayer number, fifteen digits' => [
            'vod_id_taxpayer_number',
            IdTaxpayerNumber::from('012345678901234'),
        ];
    }

    /**
     * @return iterable<string, array{non-empty-string, StringConvertible, positive-int}>
     */
    public static function stringLengths(): iterable
    {
        foreach (self::strings() as $label => [$name, $vo, $length]) {
            yield $label => [$name, $vo, $length];
        }
    }

    /**
     * @return iterable<string, array{non-empty-string, non-empty-string}>
     */
    public static function stringInvalids(): iterable
    {
        foreach (self::strings() as $label => [$name, , , $invalid]) {
            yield $label => [$name, $invalid];
        }
    }

    /**
     * @return iterable<string, array{non-empty-string}>
     */
    public static function compositeNames(): iterable
    {
        foreach (self::composites() as $label => [$name]) {
            yield $label => [$name];
        }
    }
}
