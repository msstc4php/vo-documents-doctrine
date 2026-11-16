<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Unit\Odm;

use Doctrine\ODM\MongoDB\Types\Type;
use InvalidArgumentException;
use MSSTC4PHP\ValueObject\Contract\StringConvertible;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuActDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuMedicareCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuNswDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuNtDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuQldDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuSaDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuTasDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuTaxFileNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuVicDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuWaDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrCnsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrCpfType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrNisType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrSpIdentityCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrVoterRegistrationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaAbDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaAbHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaBcDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaBcHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaMbHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaNbHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaNlHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaNsDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaNsHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaNtHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaNuHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaOnDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaOnHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaOnHealthCardVersionCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaPeHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaQcDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaQcHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaSkDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaSkHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaSocialInsuranceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaYtHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChAhvNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChIdentityDocumentNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DeFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DeGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DeIdentityCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DePassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DePensionInsuranceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DeTaxIdentificationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\EsDniType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\EsFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\EsGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\EsNieType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\EsSocialSecurityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrLegacyIdentityCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrNirType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrTaxIdentificationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbChiNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbGreatBritainDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbHealthAndCareNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbNationalInsuranceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbNhsNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbNorthernIrelandDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\IcaoPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItFiscalCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxCurpType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxElectorKeyType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxMexDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxRfcType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxSocialSecurityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\NlBsnType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\NlFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\NlGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\NlIdentityDocumentNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuInnType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuInternalPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuInternationalPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuOmsPolicyNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPassportIssuingUnitCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPatronymicType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuSnilsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TypeRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsAlDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsAzDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsCoDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsCtDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsFlDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsHiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsIaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsIdDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsIlDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsInDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsItinType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsKsDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsKyDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMdDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMedicareBeneficiaryIdentifierType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMeDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMiddleNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMsDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsNdDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsNeDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsNjDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsNmDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsNyDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsOkDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsPaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsPassportBookNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsPassportCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsRiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsSocialSecurityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsTxDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsVtDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsWaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsWiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsWyDlIdNumberType;
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
    #[Override]
    protected function setUp(): void
    {
        TypeRegistrar::registerAll();
    }

    #[DataProviderExternal(Samples::class, 'stringPairs')]
    public function testRoundTripsTheCanonicalForm(string $name, StringConvertible $vo): void
    {
        $type = Type::getType($name);

        $stored = $type->convertToDatabaseValue($vo);
        self::assertSame((string) $vo, $stored);

        $restored = $type->convertToPHPValue($stored);
        self::assertInstanceOf($vo::class, $restored);
        self::assertSame((string) $vo, (string) $restored);
    }

    public function testOntarioCardIsStoredAsTheNumberAndTheVersionCode(): void
    {
        $card = OnHealthCardNumber::fromCard('9876543217 YM');
        $numberType = Type::getType(CaOnHealthCardNumberType::NAME);
        $versionCodeType = Type::getType(CaOnHealthCardVersionCodeType::NAME);

        self::assertSame('9876543217', $numberType->convertToDatabaseValue($card->number()));
        self::assertSame('YM', $versionCodeType->convertToDatabaseValue($card->versionCode()));

        $versionCode = $versionCodeType->convertToPHPValue('YM');
        self::assertInstanceOf(OnHealthCardVersionCode::class, $versionCode);
        self::assertTrue($card->versionCode()?->equals($versionCode));
    }

    #[DataProviderExternal(Samples::class, 'stringNames')]
    public function testNullRoundTrips(string $name): void
    {
        $type = Type::getType($name);

        self::assertNull($type->convertToDatabaseValue(null));
        self::assertNull($type->convertToPHPValue(null));
    }

    #[DataProviderExternal(Samples::class, 'stringInvalids')]
    public function testInvalidStoredValueThrowsWithoutEchoingIt(string $name, string $invalid): void
    {
        try {
            Type::getType($name)->convertToPHPValue($invalid);
            self::fail('An invalid stored value was accepted.');
        } catch (InvalidValueObjectException $exception) {
            self::assertStringNotContainsString($invalid, $exception->getMessage());
        }
    }

    #[DataProviderExternal(Samples::class, 'stringNames')]
    public function testRefusesAPlainStringOnWrite(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToDatabaseValue('11223344595');
    }

    #[DataProviderExternal(Samples::class, 'stringNames')]
    public function testRefusesANonStringColumnValue(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToPHPValue(123);
    }
}
