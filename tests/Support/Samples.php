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
use MSSTC4PHP\ValueObject\Documents\Document\RU\DriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Inn;
use MSSTC4PHP\ValueObject\Documents\Document\RU\InternalPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\InternationalPassportNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\OmsPolicyNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\PassportIssuingUnitCode;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
use MSSTC4PHP\ValueObject\Documents\Icao\PersonName as IcaoPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\FamilyName as AuFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\GivenName as AuGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\PersonName as AuPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\FamilyName as RuFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\GivenName as RuGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\Patronymic;
use MSSTC4PHP\ValueObject\Documents\Name\RU\PersonName as RuPersonName;

/**
 * A longest canonical sample and a stored value that must be refused, per type name.
 */
final class Samples
{
    private const string BAD_DOCUMENT = '!!!';

    private const string BAD_NAME = '123';

    /**
     * @return iterable<string, array{non-empty-string, StringConvertible, positive-int|null, non-empty-string}>
     *                                                                                                           type name, longest canonical sample, column length (null: free text), invalid stored value
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
        yield 'ru family name' => ['vod_ru_family_name', RuFamilyName::from('Иванов'), null, self::BAD_NAME];
        yield 'ru given name' => ['vod_ru_given_name', RuGivenName::from('Иван'), null, self::BAD_NAME];
        yield 'ru patronymic' => ['vod_ru_patronymic', Patronymic::from('Иванович'), null, self::BAD_NAME];
        yield 'au family name' => ['vod_au_family_name', AuFamilyName::from("O'Brien"), null, self::BAD_NAME];
        yield 'au given name' => ['vod_au_given_name', AuGivenName::from('Jane'), null, self::BAD_NAME];
        yield 'icao person name' => ['vod_icao_person_name', IcaoPersonName::from('VAN<DER<BERG<<JAN<PIETER'), null, self::BAD_NAME];
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
            new AuPersonName(AuFamilyName::from('Smith'), AuGivenName::from('Jane'), IcaoPersonName::from('SMITH<<JANE')),
            ['family' => 'Smith', 'given' => 'Jane', 'latin' => 'SMITH<<JANE'],
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
     * @return iterable<string, array{non-empty-string, StringConvertible, positive-int|null}>
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
