<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use Doctrine\DBAL\Types\Type;

/**
 * Registers every document value-object type. Call once at bootstrap for bare Doctrine; under Symfony map
 * {@see types()} under `doctrine.dbal.types` instead. Registration is idempotent, so it is safe in long-running workers.
 */
final class TypeRegistrar
{
    /**
     * @var array<non-empty-string, class-string<Type>>
     */
    private const array TYPES = [
        RuInternalPassportNumberType::NAME => RuInternalPassportNumberType::class,
        RuInternationalPassportNumberType::NAME => RuInternationalPassportNumberType::class,
        RuDriverLicenceNumberType::NAME => RuDriverLicenceNumberType::class,
        RuInnType::NAME => RuInnType::class,
        RuOmsPolicyNumberType::NAME => RuOmsPolicyNumberType::class,
        RuPassportIssuingUnitCodeType::NAME => RuPassportIssuingUnitCodeType::class,
        RuSnilsType::NAME => RuSnilsType::class,
        AuMedicareCardNumberType::NAME => AuMedicareCardNumberType::class,
        AuTaxFileNumberType::NAME => AuTaxFileNumberType::class,
        AuActDriverLicenceNumberType::NAME => AuActDriverLicenceNumberType::class,
        AuNswDriverLicenceNumberType::NAME => AuNswDriverLicenceNumberType::class,
        AuNtDriverLicenceNumberType::NAME => AuNtDriverLicenceNumberType::class,
        AuQldDriverLicenceNumberType::NAME => AuQldDriverLicenceNumberType::class,
        AuSaDriverLicenceNumberType::NAME => AuSaDriverLicenceNumberType::class,
        AuTasDriverLicenceNumberType::NAME => AuTasDriverLicenceNumberType::class,
        AuVicDriverLicenceNumberType::NAME => AuVicDriverLicenceNumberType::class,
        AuWaDriverLicenceNumberType::NAME => AuWaDriverLicenceNumberType::class,
        RuFamilyNameType::NAME => RuFamilyNameType::class,
        RuGivenNameType::NAME => RuGivenNameType::class,
        RuPatronymicType::NAME => RuPatronymicType::class,
        AuFamilyNameType::NAME => AuFamilyNameType::class,
        AuGivenNameType::NAME => AuGivenNameType::class,
        IcaoPersonNameType::NAME => IcaoPersonNameType::class,
        RuPersonNameType::NAME => RuPersonNameType::class,
        AuPersonNameType::NAME => AuPersonNameType::class,
    ];

    public static function registerAll(): void
    {
        foreach (self::TYPES as $name => $class) {
            if (!Type::hasType($name)) {
                Type::addType($name, $class);
            }
        }
    }

    /**
     * @return array<non-empty-string, class-string<Type>>
     */
    public static function types(): array
    {
        return self::TYPES;
    }
}
