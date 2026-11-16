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
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrCnsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrCpfType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrNisType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrSpIdentityCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrVoterRegistrationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaAbDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaAbHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaBcDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaBcHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaMbHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaNbHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaNlHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaNsDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaNsHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaNtHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaNuHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaOnDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaOnHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaOnHealthCardVersionCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaPeHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaQcDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaQcHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaSkDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaSkHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaSocialInsuranceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaYtHealthCardNumberType;
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
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxCurpType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxElectorKeyType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxMexDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxRfcType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxSocialSecurityNumberType;
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
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsAlDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsAzDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsCoDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsCtDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsFlDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsHiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsIaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsIdDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsIlDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsInDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsItinType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsKsDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsKyDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMdDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMedicareBeneficiaryIdentifierType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMeDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMiddleNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMsDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsNdDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsNeDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsNjDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsNmDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsNyDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsOkDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsPaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsPassportBookNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsPassportCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsRiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsSocialSecurityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsTxDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsVtDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsWaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsWiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsWyDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Samples;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\OnHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\OnHealthCardVersionCode;
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
#[CoversClass(BrCnsType::class)]
#[CoversClass(BrCpfType::class)]
#[CoversClass(BrDriverLicenceNumberType::class)]
#[CoversClass(BrSpIdentityCardNumberType::class)]
#[CoversClass(BrNisType::class)]
#[CoversClass(BrPassportNumberType::class)]
#[CoversClass(BrVoterRegistrationNumberType::class)]
#[CoversClass(CaAbDriverLicenceNumberType::class)]
#[CoversClass(CaBcDriverLicenceNumberType::class)]
#[CoversClass(CaNsDriverLicenceNumberType::class)]
#[CoversClass(CaOnDriverLicenceNumberType::class)]
#[CoversClass(CaQcDriverLicenceNumberType::class)]
#[CoversClass(CaSkDriverLicenceNumberType::class)]
#[CoversClass(CaAbHealthCardNumberType::class)]
#[CoversClass(CaBcHealthCardNumberType::class)]
#[CoversClass(CaMbHealthCardNumberType::class)]
#[CoversClass(CaNbHealthCardNumberType::class)]
#[CoversClass(CaNlHealthCardNumberType::class)]
#[CoversClass(CaNsHealthCardNumberType::class)]
#[CoversClass(CaNtHealthCardNumberType::class)]
#[CoversClass(CaNuHealthCardNumberType::class)]
#[CoversClass(CaOnHealthCardNumberType::class)]
#[CoversClass(CaOnHealthCardVersionCodeType::class)]
#[CoversClass(CaPeHealthCardNumberType::class)]
#[CoversClass(CaQcHealthCardNumberType::class)]
#[CoversClass(CaSkHealthCardNumberType::class)]
#[CoversClass(CaYtHealthCardNumberType::class)]
#[CoversClass(CaPassportNumberType::class)]
#[CoversClass(CaSocialInsuranceNumberType::class)]
#[CoversClass(MxCurpType::class)]
#[CoversClass(MxMexDriverLicenceNumberType::class)]
#[CoversClass(MxElectorKeyType::class)]
#[CoversClass(MxRfcType::class)]
#[CoversClass(MxSocialSecurityNumberType::class)]
#[CoversClass(UsAlDlIdNumberType::class)]
#[CoversClass(UsAzDlIdNumberType::class)]
#[CoversClass(UsCoDlIdNumberType::class)]
#[CoversClass(UsCtDlIdNumberType::class)]
#[CoversClass(UsFlDlIdNumberType::class)]
#[CoversClass(UsHiDlIdNumberType::class)]
#[CoversClass(UsIaDlIdNumberType::class)]
#[CoversClass(UsIdDlIdNumberType::class)]
#[CoversClass(UsIlDlIdNumberType::class)]
#[CoversClass(UsInDlIdNumberType::class)]
#[CoversClass(UsKsDlIdNumberType::class)]
#[CoversClass(UsKyDlIdNumberType::class)]
#[CoversClass(UsMaDlIdNumberType::class)]
#[CoversClass(UsMdDlIdNumberType::class)]
#[CoversClass(UsMeDlIdNumberType::class)]
#[CoversClass(UsMiDlIdNumberType::class)]
#[CoversClass(UsMsDlIdNumberType::class)]
#[CoversClass(UsNdDlIdNumberType::class)]
#[CoversClass(UsNeDlIdNumberType::class)]
#[CoversClass(UsNjDlIdNumberType::class)]
#[CoversClass(UsNmDlIdNumberType::class)]
#[CoversClass(UsNyDlIdNumberType::class)]
#[CoversClass(UsOkDlIdNumberType::class)]
#[CoversClass(UsPaDlIdNumberType::class)]
#[CoversClass(UsRiDlIdNumberType::class)]
#[CoversClass(UsTxDlIdNumberType::class)]
#[CoversClass(UsVtDlIdNumberType::class)]
#[CoversClass(UsWaDlIdNumberType::class)]
#[CoversClass(UsWiDlIdNumberType::class)]
#[CoversClass(UsWyDlIdNumberType::class)]
#[CoversClass(UsItinType::class)]
#[CoversClass(UsMedicareBeneficiaryIdentifierType::class)]
#[CoversClass(UsPassportBookNumberType::class)]
#[CoversClass(UsPassportCardNumberType::class)]
#[CoversClass(UsSocialSecurityNumberType::class)]
#[CoversClass(BrFamilyNameType::class)]
#[CoversClass(BrGivenNameType::class)]
#[CoversClass(CaFamilyNameType::class)]
#[CoversClass(CaGivenNameType::class)]
#[CoversClass(MxFamilyNameType::class)]
#[CoversClass(MxGivenNameType::class)]
#[CoversClass(UsFamilyNameType::class)]
#[CoversClass(UsGivenNameType::class)]
#[CoversClass(UsMiddleNameType::class)]
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

    public function testOntarioCardIsStoredAsTheNumberAndTheVersionCode(): void
    {
        $card = OnHealthCardNumber::fromCard('9876543217 YM');
        $numberType = Type::getType(CaOnHealthCardNumberType::NAME);
        $versionCodeType = Type::getType(CaOnHealthCardVersionCodeType::NAME);

        self::assertSame('9876543217', $numberType->convertToDatabaseValue($card->number(), $this->platform));
        self::assertSame('YM', $versionCodeType->convertToDatabaseValue($card->versionCode(), $this->platform));

        $versionCode = $versionCodeType->convertToPHPValue('YM', $this->platform);
        self::assertInstanceOf(OnHealthCardVersionCode::class, $versionCode);
        self::assertTrue($card->versionCode()?->equals($versionCode));
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
