<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Unit\Orm;

use Doctrine\DBAL\Platforms\SQLitePlatform;
use Doctrine\DBAL\Types\Type;
use InvalidArgumentException;
use MSSTC4PHP\ValueObject\Contract\StringConvertible;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuActDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuMedicareCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuNswDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuNtDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuQldDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuSaDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuTasDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuTaxFileNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuVicDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuWaDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChAhvNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChIdentityDocumentNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DeFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DeGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DeIdentityCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DePassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DePensionInsuranceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DeTaxIdentificationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsDniType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsNieType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsSocialSecurityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrLegacyIdentityCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrNirType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrTaxIdentificationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbChiNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbGreatBritainDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbHealthAndCareNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbNationalInsuranceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbNhsNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbNorthernIrelandDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\IcaoPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItFiscalCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\NlBsnType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\NlFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\NlGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\NlIdentityDocumentNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuInnType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuInternalPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuInternationalPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuOmsPolicyNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPassportIssuingUnitCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPatronymicType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuSnilsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TypeRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Samples;
use MSSTC4PHP\ValueObject\Exception\InvalidValueObjectException;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(AuActDriverLicenceNumberType::class)]
#[CoversClass(AuFamilyNameType::class)]
#[CoversClass(AuGivenNameType::class)]
#[CoversClass(AuMedicareCardNumberType::class)]
#[CoversClass(AuNswDriverLicenceNumberType::class)]
#[CoversClass(AuNtDriverLicenceNumberType::class)]
#[CoversClass(AuQldDriverLicenceNumberType::class)]
#[CoversClass(AuSaDriverLicenceNumberType::class)]
#[CoversClass(AuTasDriverLicenceNumberType::class)]
#[CoversClass(AuTaxFileNumberType::class)]
#[CoversClass(AuVicDriverLicenceNumberType::class)]
#[CoversClass(AuWaDriverLicenceNumberType::class)]
#[CoversClass(RuDriverLicenceNumberType::class)]
#[CoversClass(RuFamilyNameType::class)]
#[CoversClass(RuGivenNameType::class)]
#[CoversClass(RuInnType::class)]
#[CoversClass(RuInternalPassportNumberType::class)]
#[CoversClass(RuInternationalPassportNumberType::class)]
#[CoversClass(RuOmsPolicyNumberType::class)]
#[CoversClass(RuPassportIssuingUnitCodeType::class)]
#[CoversClass(RuPatronymicType::class)]
#[CoversClass(RuSnilsType::class)]
#[CoversClass(IcaoPersonNameType::class)]
#[CoversClass(DeIdentityCardNumberType::class)]
#[CoversClass(DePassportNumberType::class)]
#[CoversClass(DePensionInsuranceNumberType::class)]
#[CoversClass(DeTaxIdentificationNumberType::class)]
#[CoversClass(FrDriverLicenceNumberType::class)]
#[CoversClass(FrLegacyIdentityCardNumberType::class)]
#[CoversClass(FrNirType::class)]
#[CoversClass(FrPassportNumberType::class)]
#[CoversClass(FrTaxIdentificationNumberType::class)]
#[CoversClass(ItFiscalCodeType::class)]
#[CoversClass(ItPassportNumberType::class)]
#[CoversClass(EsDniType::class)]
#[CoversClass(EsNieType::class)]
#[CoversClass(EsSocialSecurityNumberType::class)]
#[CoversClass(NlBsnType::class)]
#[CoversClass(NlIdentityDocumentNumberType::class)]
#[CoversClass(ChAhvNumberType::class)]
#[CoversClass(ChDriverLicenceNumberType::class)]
#[CoversClass(ChIdentityDocumentNumberType::class)]
#[CoversClass(GbChiNumberType::class)]
#[CoversClass(GbGreatBritainDriverLicenceNumberType::class)]
#[CoversClass(GbHealthAndCareNumberType::class)]
#[CoversClass(GbNationalInsuranceNumberType::class)]
#[CoversClass(GbNhsNumberType::class)]
#[CoversClass(GbNorthernIrelandDriverLicenceNumberType::class)]
#[CoversClass(GbPassportNumberType::class)]
#[CoversClass(TrIdentityNumberType::class)]
#[CoversClass(TrPassportNumberType::class)]
#[CoversClass(DeFamilyNameType::class)]
#[CoversClass(DeGivenNameType::class)]
#[CoversClass(FrFamilyNameType::class)]
#[CoversClass(FrGivenNameType::class)]
#[CoversClass(ItFamilyNameType::class)]
#[CoversClass(ItGivenNameType::class)]
#[CoversClass(EsFamilyNameType::class)]
#[CoversClass(EsGivenNameType::class)]
#[CoversClass(NlFamilyNameType::class)]
#[CoversClass(NlGivenNameType::class)]
#[CoversClass(ChFamilyNameType::class)]
#[CoversClass(ChGivenNameType::class)]
#[CoversClass(GbFamilyNameType::class)]
#[CoversClass(GbGivenNameType::class)]
#[CoversClass(TrFamilyNameType::class)]
#[CoversClass(TrGivenNameType::class)]
#[CoversClass(TypeRegistrar::class)]
final class StringTypesTest extends TestCase
{
    private SQLitePlatform $platform;

    #[Override]
    protected function setUp(): void
    {
        TypeRegistrar::registerAll();
        $this->platform = new SQLitePlatform();
    }

    #[DataProviderExternal(Samples::class, 'stringPairs')]
    public function testRoundTripsTheCanonicalForm(string $name, StringConvertible $vo): void
    {
        $type = Type::getType($name);

        $stored = $type->convertToDatabaseValue($vo, $this->platform);
        self::assertSame((string) $vo, $stored);

        $restored = $type->convertToPHPValue($stored, $this->platform);
        self::assertInstanceOf($vo::class, $restored);
        self::assertSame((string) $vo, (string) $restored);
    }

    #[DataProviderExternal(Samples::class, 'stringLengths')]
    public function testColumnFitsExactlyTheLongestAcceptedForm(string $name, StringConvertible $vo, int $length): void
    {
        self::assertSame(\sprintf('VARCHAR(%d)', $length), Type::getType($name)->getSQLDeclaration([], $this->platform));
        self::assertSame($length, \mb_strlen((string) $vo));

        $this->expectException(InvalidValueObjectException::class);
        $vo::from($vo . \mb_substr((string) $vo, -1));
    }

    #[DataProviderExternal(Samples::class, 'stringNames')]
    public function testNullRoundTrips(string $name): void
    {
        $type = Type::getType($name);

        self::assertNull($type->convertToDatabaseValue(null, $this->platform));
        self::assertNull($type->convertToPHPValue(null, $this->platform));
    }

    #[DataProviderExternal(Samples::class, 'stringInvalids')]
    public function testInvalidStoredValueThrowsWithoutEchoingIt(string $name, string $invalid): void
    {
        try {
            Type::getType($name)->convertToPHPValue($invalid, $this->platform);
            self::fail('An invalid stored value was accepted.');
        } catch (InvalidValueObjectException $exception) {
            self::assertStringNotContainsString($invalid, $exception->getMessage());
        }
    }

    #[DataProviderExternal(Samples::class, 'stringNames')]
    public function testRefusesAPlainStringOnWrite(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToDatabaseValue('11223344595', $this->platform);
    }

    #[DataProviderExternal(Samples::class, 'stringNames')]
    public function testRefusesANonStringColumnValue(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToPHPValue(123, $this->platform);
    }
}
