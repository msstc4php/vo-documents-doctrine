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
use MSSTC4PHP\ValueObject\Documents\Document\CH\AhvNumber as ChAhvNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CH\DriverLicenceNumber as ChDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CH\IdentityDocumentNumber as ChIdentityDocumentNumber;
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
use MSSTC4PHP\ValueObject\Documents\Document\IT\FiscalCode as ItFiscalCode;
use MSSTC4PHP\ValueObject\Documents\Document\IT\PassportNumber as ItPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\NL\Bsn as NlBsn;
use MSSTC4PHP\ValueObject\Documents\Document\NL\IdentityDocumentNumber as NlIdentityDocumentNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\DriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Inn;
use MSSTC4PHP\ValueObject\Documents\Document\RU\InternalPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\InternationalPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\OmsPolicyNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\PassportIssuingUnitCode;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
use MSSTC4PHP\ValueObject\Documents\Document\TR\IdentityNumber as TrIdentityNumber;
use MSSTC4PHP\ValueObject\Documents\Document\TR\PassportNumber as TrPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Icao\PersonName as IcaoPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\AbstractNamePart;
use MSSTC4PHP\ValueObject\Documents\Name\AU\FamilyName as AuFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\GivenName as AuGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\PersonName as AuPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\CH\FamilyName as ChFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\CH\GivenName as ChGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\CH\PersonName as ChPersonName;
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
use MSSTC4PHP\ValueObject\Documents\Name\IT\FamilyName as ItFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\IT\GivenName as ItGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\IT\PersonName as ItPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\NL\FamilyName as NlFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\NL\GivenName as NlGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\NL\PersonName as NlPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\FamilyName as RuFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\GivenName as RuGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\Patronymic;
use MSSTC4PHP\ValueObject\Documents\Name\RU\PersonName as RuPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\TR\FamilyName as TrFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\TR\GivenName as TrGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\TR\PersonName as TrPersonName;

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
        yield 'ru oms' => ['vod_ru_oms_policy_number', OmsPolicyNumber::from('1234567890000007'), 16, self::BAD_DOCUMENT];
        yield 'ru driver licence' => ['vod_ru_driver_licence_number', DriverLicenceNumber::from('99 03 123456'), 10, self::BAD_DOCUMENT];
        yield 'ru internal passport' => ['vod_ru_internal_passport_number', InternalPassportNumber::from('45 04 123456'), 10, self::BAD_DOCUMENT];
        yield 'ru international passport' => ['vod_ru_international_passport_number', InternationalPassportNumber::from('75 1234567'), 9, self::BAD_DOCUMENT];
        yield 'ru issuing unit code' => ['vod_ru_passport_issuing_unit_code', PassportIssuingUnitCode::from('770-001'), 6, self::BAD_DOCUMENT];
        yield 'au medicare' => ['vod_au_medicare_card_number', MedicareCardNumber::from('2000 00002 0'), 10, self::BAD_DOCUMENT];
        yield 'au tfn' => ['vod_au_tax_file_number', TaxFileNumber::from('123 456 009'), 9, self::BAD_DOCUMENT];
        yield 'au act' => ['vod_au_act_driver_licence_number', ActDriverLicenceNumber::from('1234567890'), 10, self::BAD_DOCUMENT];
        yield 'au nsw' => ['vod_au_nsw_driver_licence_number', NswDriverLicenceNumber::from('AB123456'), 8, self::BAD_DOCUMENT];
        yield 'au nt' => ['vod_au_nt_driver_licence_number', NtDriverLicenceNumber::from('1234567890'), 10, self::BAD_DOCUMENT];
        yield 'au qld' => ['vod_au_qld_driver_licence_number', QldDriverLicenceNumber::from('123456789'), 9, self::BAD_DOCUMENT];
        yield 'au sa' => ['vod_au_sa_driver_licence_number', SaDriverLicenceNumber::from('A12345'), 6, self::BAD_DOCUMENT];
        yield 'au tas' => ['vod_au_tas_driver_licence_number', TasDriverLicenceNumber::from('ABC12345'), 8, self::BAD_DOCUMENT];
        yield 'au vic' => ['vod_au_vic_driver_licence_number', VicDriverLicenceNumber::from('1234567890'), 10, self::BAD_DOCUMENT];
        yield 'au wa' => ['vod_au_wa_driver_licence_number', WaDriverLicenceNumber::from('1234567'), 7, self::BAD_DOCUMENT];
        yield 'ru family name' => ['vod_ru_family_name', RuFamilyName::from('И' . \str_repeat('в', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'ru given name' => ['vod_ru_given_name', RuGivenName::from('И' . \str_repeat('в', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'ru patronymic' => ['vod_ru_patronymic', Patronymic::from('И' . \str_repeat('в', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'au family name' => ['vod_au_family_name', AuFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'au given name' => ['vod_au_given_name', AuGivenName::from('J' . \str_repeat('a', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'de identity card number' => ['vod_de_identity_card_number', DeIdentityCardNumber::from('LZ6311T47'), 9, self::BAD_DOCUMENT];
        yield 'de passport number' => ['vod_de_passport_number', DePassportNumber::from('LZ6311T47'), 9, self::BAD_DOCUMENT];
        yield 'de pension insurance number' => ['vod_de_pension_insurance_number', DePensionInsuranceNumber::from('65230701J008'), 12, self::BAD_DOCUMENT];
        yield 'de tax identification number' => ['vod_de_tax_identification_number', DeTaxIdentificationNumber::from('12345678901'), 11, self::BAD_DOCUMENT];
        yield 'fr driver licence number' => ['vod_fr_driver_licence_number', FrDriverLicenceNumber::from('130175102345'), 12, self::BAD_DOCUMENT];
        yield 'fr legacy identity card number' => ['vod_fr_legacy_identity_card_number', FrLegacyIdentityCardNumber::from('880692302345'), 12, self::BAD_DOCUMENT];
        yield 'fr nir' => ['vod_fr_nir', FrNir::from('121127713123250'), 15, self::BAD_DOCUMENT];
        yield 'fr passport number' => ['vod_fr_passport_number', FrPassportNumber::from('12AB34567'), 9, self::BAD_DOCUMENT];
        yield 'fr tax identification number' => ['vod_fr_tax_identification_number', FrTaxIdentificationNumber::from('3023217600053'), 13, self::BAD_DOCUMENT];
        yield 'it fiscal code' => ['vod_it_fiscal_code', ItFiscalCode::from('VRDGPP13R10B293P'), 16, self::BAD_DOCUMENT];
        yield 'it passport number' => ['vod_it_passport_number', ItPassportNumber::from('YA1234567'), 9, self::BAD_DOCUMENT];
        yield 'es dni' => ['vod_es_dni', EsDni::from('12345678Z'), 9, self::BAD_DOCUMENT];
        yield 'es nie' => ['vod_es_nie', EsNie::from('X12345678Z'), 10, self::BAD_DOCUMENT];
        yield 'es social security number' => ['vod_es_social_security_number', EsSocialSecurityNumber::from('281234565678'), 12, self::BAD_DOCUMENT];
        yield 'nl bsn' => ['vod_nl_bsn', NlBsn::from('999990068'), 9, self::BAD_DOCUMENT];
        yield 'nl identity document number' => ['vod_nl_identity_document_number', NlIdentityDocumentNumber::from('SPECI2024'), 9, self::BAD_DOCUMENT];
        yield 'ch ahv number' => ['vod_ch_ahv_number', ChAhvNumber::from('7563047500962'), 13, self::BAD_DOCUMENT];
        yield 'ch driver licence number' => ['vod_ch_driver_licence_number', ChDriverLicenceNumber::from('000123456789003'), 15, self::BAD_DOCUMENT];
        yield 'ch identity document number' => ['vod_ch_identity_document_number', ChIdentityDocumentNumber::from('S1A00A00'), 8, self::BAD_DOCUMENT];
        yield 'gb chi number' => ['vod_gb_chi_number', GbChiNumber::from('1203456719'), 10, self::BAD_DOCUMENT];
        yield 'gb great britain driver licence number' => ['vod_gb_great_britain_driver_licence_number', GbGreatBritainDriverLicenceNumber::from('MORGA657054SM9IJ'), 16, self::BAD_DOCUMENT];
        yield 'gb health and care number' => ['vod_gb_health_and_care_number', GbHealthAndCareNumber::from('3456789122'), 10, self::BAD_DOCUMENT];
        yield 'gb national insurance number' => ['vod_gb_national_insurance_number', GbNationalInsuranceNumber::from('AB123456C'), 9, self::BAD_DOCUMENT];
        yield 'gb nhs number' => ['vod_gb_nhs_number', GbNhsNumber::from('9434765919'), 10, self::BAD_DOCUMENT];
        yield 'gb northern ireland driver licence number' => ['vod_gb_northern_ireland_driver_licence_number', GbNorthernIrelandDriverLicenceNumber::from('12345678'), 8, self::BAD_DOCUMENT];
        yield 'gb passport number' => ['vod_gb_passport_number', GbPassportNumber::from('123456789'), 9, self::BAD_DOCUMENT];
        yield 'tr identity number' => ['vod_tr_identity_number', TrIdentityNumber::from('12345678901'), 11, self::BAD_DOCUMENT];
        yield 'tr passport number' => ['vod_tr_passport_number', TrPassportNumber::from('U00000261'), 9, self::BAD_DOCUMENT];
        yield 'de family name' => ['vod_de_family_name', DeFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'de given name' => ['vod_de_given_name', DeGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'fr family name' => ['vod_fr_family_name', FrFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'fr given name' => ['vod_fr_given_name', FrGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'it family name' => ['vod_it_family_name', ItFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'it given name' => ['vod_it_given_name', ItGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'es family name' => ['vod_es_family_name', EsFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'es given name' => ['vod_es_given_name', EsGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'nl family name' => ['vod_nl_family_name', NlFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'nl given name' => ['vod_nl_given_name', NlGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'ch family name' => ['vod_ch_family_name', ChFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'ch given name' => ['vod_ch_given_name', ChGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'gb family name' => ['vod_gb_family_name', GbFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'gb given name' => ['vod_gb_given_name', GbGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'tr family name' => ['vod_tr_family_name', TrFamilyName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'tr given name' => ['vod_tr_given_name', TrGivenName::from('S' . \str_repeat('m', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'tr family name multibyte' => ['vod_tr_family_name', TrFamilyName::from('İ' . \str_repeat('ı', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'fr given name multibyte' => ['vod_fr_given_name', FrGivenName::from('É' . \str_repeat('é', AbstractNamePart::MAX_LENGTH - 1)), AbstractNamePart::MAX_LENGTH, self::BAD_NAME];
        yield 'icao person name' => ['vod_icao_person_name', IcaoPersonName::from(\str_repeat('A', 127) . '<<' . \str_repeat('B', IcaoPersonName::MAX_LENGTH - 129)), IcaoPersonName::MAX_LENGTH, self::BAD_NAME];
    }

    /**
     * @return iterable<string, array{non-empty-string, ValueObject, array<string, string|null>}>
     *                                                                                            type name, value object, its expected payload
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
            new RuPersonName(RuFamilyName::from('Иванов'), RuGivenName::from('Иван'), Patronymic::from('Иванович'), IcaoPersonName::from('IVANOV<<IVAN<IVANOVICH')),
            ['family' => 'Иванов', 'given' => 'Иван', 'patronymic' => 'Иванович', 'latin' => 'IVANOV<<IVAN<IVANOVICH'],
        ];
        yield 'au person name' => [
            'vod_au_person_name',
            new AuPersonName(AuFamilyName::from('Smith'), AuGivenName::from('Jane')),
            ['family' => 'Smith', 'given' => 'Jane', 'latin' => null],
        ];
        yield 'au person name with latin override' => [
            'vod_au_person_name',
            new AuPersonName(AuFamilyName::from('Müller'), AuGivenName::from('Zoë'), IcaoPersonName::from('MULLER<<ZOE')),
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
