<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Unit\Contract;

use Doctrine\DBAL\Types\Type as OrmType;
use Doctrine\ODM\MongoDB\Types\Type as OdmType;
use FilesystemIterator;
use MSSTC4PHP\ValueObject\Contract\StringConvertible;
use MSSTC4PHP\ValueObject\Contract\ValueObject;
use MSSTC4PHP\ValueObject\Documents\Codecs;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuActDriverLicenceNumberType as OdmAuActDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuFamilyNameType as OdmAuFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuGivenNameType as OdmAuGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuMedicareCardNumberType as OdmAuMedicareCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuNswDriverLicenceNumberType as OdmAuNswDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuNtDriverLicenceNumberType as OdmAuNtDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuPersonNameType as OdmAuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuQldDriverLicenceNumberType as OdmAuQldDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuSaDriverLicenceNumberType as OdmAuSaDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuTasDriverLicenceNumberType as OdmAuTasDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuTaxFileNumberType as OdmAuTaxFileNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuVicDriverLicenceNumberType as OdmAuVicDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuWaDriverLicenceNumberType as OdmAuWaDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChAhvNumberType as OdmChAhvNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChDriverLicenceNumberType as OdmChDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChFamilyNameType as OdmChFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChGivenNameType as OdmChGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChIdentityDocumentNumberType as OdmChIdentityDocumentNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChPersonNameType as OdmChPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DeFamilyNameType as OdmDeFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DeGivenNameType as OdmDeGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DeIdentityCardNumberType as OdmDeIdentityCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DePassportNumberType as OdmDePassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DePensionInsuranceNumberType as OdmDePensionInsuranceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DePersonNameType as OdmDePersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DeTaxIdentificationNumberType as OdmDeTaxIdentificationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\EsDniType as OdmEsDniType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\EsFamilyNameType as OdmEsFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\EsGivenNameType as OdmEsGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\EsNieType as OdmEsNieType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\EsPersonNameType as OdmEsPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\EsSocialSecurityNumberType as OdmEsSocialSecurityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrDriverLicenceNumberType as OdmFrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrFamilyNameType as OdmFrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrGivenNameType as OdmFrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrLegacyIdentityCardNumberType as OdmFrLegacyIdentityCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrNirType as OdmFrNirType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrPassportNumberType as OdmFrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrPersonNameType as OdmFrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrTaxIdentificationNumberType as OdmFrTaxIdentificationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbChiNumberType as OdmGbChiNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbFamilyNameType as OdmGbFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbGivenNameType as OdmGbGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbGreatBritainDriverLicenceNumberType as OdmGbGreatBritainDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbHealthAndCareNumberType as OdmGbHealthAndCareNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbNationalInsuranceNumberType as OdmGbNationalInsuranceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbNhsNumberType as OdmGbNhsNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbNorthernIrelandDriverLicenceNumberType as OdmGbNorthernIrelandDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbPassportNumberType as OdmGbPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbPersonNameType as OdmGbPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\IcaoPersonNameType as OdmIcaoPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItFamilyNameType as OdmItFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItFiscalCodeType as OdmItFiscalCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItGivenNameType as OdmItGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItPassportNumberType as OdmItPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItPersonNameType as OdmItPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\NlBsnType as OdmNlBsnType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\NlFamilyNameType as OdmNlFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\NlGivenNameType as OdmNlGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\NlIdentityDocumentNumberType as OdmNlIdentityDocumentNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\NlPersonNameType as OdmNlPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuDriverLicenceNumberType as OdmRuDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuFamilyNameType as OdmRuFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuGivenNameType as OdmRuGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuInnType as OdmRuInnType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuInternalPassportNumberType as OdmRuInternalPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuInternationalPassportNumberType as OdmRuInternationalPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuOmsPolicyNumberType as OdmRuOmsPolicyNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPassportIssuingUnitCodeType as OdmRuPassportIssuingUnitCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPatronymicType as OdmRuPatronymicType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPersonNameType as OdmRuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuSnilsType as OdmRuSnilsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrFamilyNameType as OdmTrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrGivenNameType as OdmTrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrIdentityNumberType as OdmTrIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrPassportNumberType as OdmTrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrPersonNameType as OdmTrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TypeRegistrar as OdmRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuActDriverLicenceNumberType as OrmAuActDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuFamilyNameType as OrmAuFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuGivenNameType as OrmAuGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuMedicareCardNumberType as OrmAuMedicareCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuNswDriverLicenceNumberType as OrmAuNswDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuNtDriverLicenceNumberType as OrmAuNtDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuPersonNameType as OrmAuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuQldDriverLicenceNumberType as OrmAuQldDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuSaDriverLicenceNumberType as OrmAuSaDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuTasDriverLicenceNumberType as OrmAuTasDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuTaxFileNumberType as OrmAuTaxFileNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuVicDriverLicenceNumberType as OrmAuVicDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuWaDriverLicenceNumberType as OrmAuWaDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChAhvNumberType as OrmChAhvNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChDriverLicenceNumberType as OrmChDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChFamilyNameType as OrmChFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChGivenNameType as OrmChGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChIdentityDocumentNumberType as OrmChIdentityDocumentNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChPersonNameType as OrmChPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DeFamilyNameType as OrmDeFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DeGivenNameType as OrmDeGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DeIdentityCardNumberType as OrmDeIdentityCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DePassportNumberType as OrmDePassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DePensionInsuranceNumberType as OrmDePensionInsuranceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DePersonNameType as OrmDePersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DeTaxIdentificationNumberType as OrmDeTaxIdentificationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsDniType as OrmEsDniType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsFamilyNameType as OrmEsFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsGivenNameType as OrmEsGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsNieType as OrmEsNieType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsPersonNameType as OrmEsPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsSocialSecurityNumberType as OrmEsSocialSecurityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrDriverLicenceNumberType as OrmFrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrFamilyNameType as OrmFrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrGivenNameType as OrmFrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrLegacyIdentityCardNumberType as OrmFrLegacyIdentityCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrNirType as OrmFrNirType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrPassportNumberType as OrmFrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrPersonNameType as OrmFrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrTaxIdentificationNumberType as OrmFrTaxIdentificationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbChiNumberType as OrmGbChiNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbFamilyNameType as OrmGbFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbGivenNameType as OrmGbGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbGreatBritainDriverLicenceNumberType as OrmGbGreatBritainDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbHealthAndCareNumberType as OrmGbHealthAndCareNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbNationalInsuranceNumberType as OrmGbNationalInsuranceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbNhsNumberType as OrmGbNhsNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbNorthernIrelandDriverLicenceNumberType as OrmGbNorthernIrelandDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbPassportNumberType as OrmGbPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbPersonNameType as OrmGbPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\IcaoPersonNameType as OrmIcaoPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItFamilyNameType as OrmItFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItFiscalCodeType as OrmItFiscalCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItGivenNameType as OrmItGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItPassportNumberType as OrmItPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItPersonNameType as OrmItPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\NlBsnType as OrmNlBsnType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\NlFamilyNameType as OrmNlFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\NlGivenNameType as OrmNlGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\NlIdentityDocumentNumberType as OrmNlIdentityDocumentNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\NlPersonNameType as OrmNlPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuDriverLicenceNumberType as OrmRuDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuFamilyNameType as OrmRuFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuGivenNameType as OrmRuGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuInnType as OrmRuInnType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuInternalPassportNumberType as OrmRuInternalPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuInternationalPassportNumberType as OrmRuInternationalPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuOmsPolicyNumberType as OrmRuOmsPolicyNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPassportIssuingUnitCodeType as OrmRuPassportIssuingUnitCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPatronymicType as OrmRuPatronymicType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPersonNameType as OrmRuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuSnilsType as OrmRuSnilsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrFamilyNameType as OrmTrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrGivenNameType as OrmTrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrIdentityNumberType as OrmTrIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrPassportNumberType as OrmTrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrPersonNameType as OrmTrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TypeRegistrar as OrmRegistrar;
use MSSTC4PHP\ValueObject\Documents\Sex;
use MSSTC4PHP\ValueObject\Payload\PayloadCodec;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use ReflectionMethod;
use SplFileInfo;

#[CoversClass(OrmRegistrar::class)]
#[CoversClass(OdmRegistrar::class)]
#[UsesClass(OrmAuActDriverLicenceNumberType::class)]
#[UsesClass(OrmAuFamilyNameType::class)]
#[UsesClass(OrmAuGivenNameType::class)]
#[UsesClass(OrmAuMedicareCardNumberType::class)]
#[UsesClass(OrmAuNswDriverLicenceNumberType::class)]
#[UsesClass(OrmAuNtDriverLicenceNumberType::class)]
#[UsesClass(OrmAuPersonNameType::class)]
#[UsesClass(OrmAuQldDriverLicenceNumberType::class)]
#[UsesClass(OrmAuSaDriverLicenceNumberType::class)]
#[UsesClass(OrmAuTasDriverLicenceNumberType::class)]
#[UsesClass(OrmAuTaxFileNumberType::class)]
#[UsesClass(OrmAuVicDriverLicenceNumberType::class)]
#[UsesClass(OrmAuWaDriverLicenceNumberType::class)]
#[UsesClass(OrmIcaoPersonNameType::class)]
#[UsesClass(OrmRuDriverLicenceNumberType::class)]
#[UsesClass(OrmRuFamilyNameType::class)]
#[UsesClass(OrmRuGivenNameType::class)]
#[UsesClass(OrmRuInnType::class)]
#[UsesClass(OrmRuInternalPassportNumberType::class)]
#[UsesClass(OrmRuInternationalPassportNumberType::class)]
#[UsesClass(OrmRuOmsPolicyNumberType::class)]
#[UsesClass(OrmRuPassportIssuingUnitCodeType::class)]
#[UsesClass(OrmRuPatronymicType::class)]
#[UsesClass(OrmRuPersonNameType::class)]
#[UsesClass(OrmRuSnilsType::class)]
#[UsesClass(OrmDeIdentityCardNumberType::class)]
#[UsesClass(OrmDePassportNumberType::class)]
#[UsesClass(OrmDePensionInsuranceNumberType::class)]
#[UsesClass(OrmDeTaxIdentificationNumberType::class)]
#[UsesClass(OrmFrDriverLicenceNumberType::class)]
#[UsesClass(OrmFrLegacyIdentityCardNumberType::class)]
#[UsesClass(OrmFrNirType::class)]
#[UsesClass(OrmFrPassportNumberType::class)]
#[UsesClass(OrmFrTaxIdentificationNumberType::class)]
#[UsesClass(OrmItFiscalCodeType::class)]
#[UsesClass(OrmItPassportNumberType::class)]
#[UsesClass(OrmEsDniType::class)]
#[UsesClass(OrmEsNieType::class)]
#[UsesClass(OrmEsSocialSecurityNumberType::class)]
#[UsesClass(OrmNlBsnType::class)]
#[UsesClass(OrmNlIdentityDocumentNumberType::class)]
#[UsesClass(OrmChAhvNumberType::class)]
#[UsesClass(OrmChDriverLicenceNumberType::class)]
#[UsesClass(OrmChIdentityDocumentNumberType::class)]
#[UsesClass(OrmGbChiNumberType::class)]
#[UsesClass(OrmGbGreatBritainDriverLicenceNumberType::class)]
#[UsesClass(OrmGbHealthAndCareNumberType::class)]
#[UsesClass(OrmGbNationalInsuranceNumberType::class)]
#[UsesClass(OrmGbNhsNumberType::class)]
#[UsesClass(OrmGbNorthernIrelandDriverLicenceNumberType::class)]
#[UsesClass(OrmGbPassportNumberType::class)]
#[UsesClass(OrmTrIdentityNumberType::class)]
#[UsesClass(OrmTrPassportNumberType::class)]
#[UsesClass(OrmDeFamilyNameType::class)]
#[UsesClass(OrmDeGivenNameType::class)]
#[UsesClass(OrmDePersonNameType::class)]
#[UsesClass(OrmFrFamilyNameType::class)]
#[UsesClass(OrmFrGivenNameType::class)]
#[UsesClass(OrmFrPersonNameType::class)]
#[UsesClass(OrmItFamilyNameType::class)]
#[UsesClass(OrmItGivenNameType::class)]
#[UsesClass(OrmItPersonNameType::class)]
#[UsesClass(OrmEsFamilyNameType::class)]
#[UsesClass(OrmEsGivenNameType::class)]
#[UsesClass(OrmEsPersonNameType::class)]
#[UsesClass(OrmNlFamilyNameType::class)]
#[UsesClass(OrmNlGivenNameType::class)]
#[UsesClass(OrmNlPersonNameType::class)]
#[UsesClass(OrmChFamilyNameType::class)]
#[UsesClass(OrmChGivenNameType::class)]
#[UsesClass(OrmChPersonNameType::class)]
#[UsesClass(OrmGbFamilyNameType::class)]
#[UsesClass(OrmGbGivenNameType::class)]
#[UsesClass(OrmGbPersonNameType::class)]
#[UsesClass(OrmTrFamilyNameType::class)]
#[UsesClass(OrmTrGivenNameType::class)]
#[UsesClass(OrmTrPersonNameType::class)]
#[UsesClass(OdmAuActDriverLicenceNumberType::class)]
#[UsesClass(OdmAuFamilyNameType::class)]
#[UsesClass(OdmAuGivenNameType::class)]
#[UsesClass(OdmAuMedicareCardNumberType::class)]
#[UsesClass(OdmAuNswDriverLicenceNumberType::class)]
#[UsesClass(OdmAuNtDriverLicenceNumberType::class)]
#[UsesClass(OdmAuPersonNameType::class)]
#[UsesClass(OdmAuQldDriverLicenceNumberType::class)]
#[UsesClass(OdmAuSaDriverLicenceNumberType::class)]
#[UsesClass(OdmAuTasDriverLicenceNumberType::class)]
#[UsesClass(OdmAuTaxFileNumberType::class)]
#[UsesClass(OdmAuVicDriverLicenceNumberType::class)]
#[UsesClass(OdmAuWaDriverLicenceNumberType::class)]
#[UsesClass(OdmIcaoPersonNameType::class)]
#[UsesClass(OdmRuDriverLicenceNumberType::class)]
#[UsesClass(OdmRuFamilyNameType::class)]
#[UsesClass(OdmRuGivenNameType::class)]
#[UsesClass(OdmRuInnType::class)]
#[UsesClass(OdmRuInternalPassportNumberType::class)]
#[UsesClass(OdmRuInternationalPassportNumberType::class)]
#[UsesClass(OdmRuOmsPolicyNumberType::class)]
#[UsesClass(OdmRuPassportIssuingUnitCodeType::class)]
#[UsesClass(OdmRuPatronymicType::class)]
#[UsesClass(OdmRuPersonNameType::class)]
#[UsesClass(OdmRuSnilsType::class)]
#[UsesClass(OdmDeIdentityCardNumberType::class)]
#[UsesClass(OdmDePassportNumberType::class)]
#[UsesClass(OdmDePensionInsuranceNumberType::class)]
#[UsesClass(OdmDeTaxIdentificationNumberType::class)]
#[UsesClass(OdmFrDriverLicenceNumberType::class)]
#[UsesClass(OdmFrLegacyIdentityCardNumberType::class)]
#[UsesClass(OdmFrNirType::class)]
#[UsesClass(OdmFrPassportNumberType::class)]
#[UsesClass(OdmFrTaxIdentificationNumberType::class)]
#[UsesClass(OdmItFiscalCodeType::class)]
#[UsesClass(OdmItPassportNumberType::class)]
#[UsesClass(OdmEsDniType::class)]
#[UsesClass(OdmEsNieType::class)]
#[UsesClass(OdmEsSocialSecurityNumberType::class)]
#[UsesClass(OdmNlBsnType::class)]
#[UsesClass(OdmNlIdentityDocumentNumberType::class)]
#[UsesClass(OdmChAhvNumberType::class)]
#[UsesClass(OdmChDriverLicenceNumberType::class)]
#[UsesClass(OdmChIdentityDocumentNumberType::class)]
#[UsesClass(OdmGbChiNumberType::class)]
#[UsesClass(OdmGbGreatBritainDriverLicenceNumberType::class)]
#[UsesClass(OdmGbHealthAndCareNumberType::class)]
#[UsesClass(OdmGbNationalInsuranceNumberType::class)]
#[UsesClass(OdmGbNhsNumberType::class)]
#[UsesClass(OdmGbNorthernIrelandDriverLicenceNumberType::class)]
#[UsesClass(OdmGbPassportNumberType::class)]
#[UsesClass(OdmTrIdentityNumberType::class)]
#[UsesClass(OdmTrPassportNumberType::class)]
#[UsesClass(OdmDeFamilyNameType::class)]
#[UsesClass(OdmDeGivenNameType::class)]
#[UsesClass(OdmDePersonNameType::class)]
#[UsesClass(OdmFrFamilyNameType::class)]
#[UsesClass(OdmFrGivenNameType::class)]
#[UsesClass(OdmFrPersonNameType::class)]
#[UsesClass(OdmItFamilyNameType::class)]
#[UsesClass(OdmItGivenNameType::class)]
#[UsesClass(OdmItPersonNameType::class)]
#[UsesClass(OdmEsFamilyNameType::class)]
#[UsesClass(OdmEsGivenNameType::class)]
#[UsesClass(OdmEsPersonNameType::class)]
#[UsesClass(OdmNlFamilyNameType::class)]
#[UsesClass(OdmNlGivenNameType::class)]
#[UsesClass(OdmNlPersonNameType::class)]
#[UsesClass(OdmChFamilyNameType::class)]
#[UsesClass(OdmChGivenNameType::class)]
#[UsesClass(OdmChPersonNameType::class)]
#[UsesClass(OdmGbFamilyNameType::class)]
#[UsesClass(OdmGbGivenNameType::class)]
#[UsesClass(OdmGbPersonNameType::class)]
#[UsesClass(OdmTrFamilyNameType::class)]
#[UsesClass(OdmTrGivenNameType::class)]
#[UsesClass(OdmTrPersonNameType::class)]
final class EveryDocumentClassHasATypeTest extends TestCase
{
    /**
     * @return iterable<string, array{'orm'|'odm'}>
     */
    public static function branches(): iterable
    {
        yield 'orm' => ['orm'];
        yield 'odm' => ['odm'];
    }

    /**
     * @param 'orm'|'odm' $branch
     */
    #[DataProvider('branches')]
    public function testEveryValueObjectHasExactlyOneType(string $branch): void
    {
        $mapped = [];
        foreach ($this->typeValueObjectClasses($branch) as $name => $class) {
            $mapped[$class][] = $name;
        }

        foreach ($this->valueObjectClasses() as $class) {
            self::assertCount(1, $mapped[$class] ?? [], \sprintf('%s needs exactly one %s type.', $class, $branch));
        }
    }

    /**
     * @param 'orm'|'odm' $branch
     */
    #[DataProvider('branches')]
    public function testNoTypeMapsAClassOutsideThePackage(string $branch): void
    {
        $expected = $this->valueObjectClasses();

        foreach ($this->typeValueObjectClasses($branch) as $name => $class) {
            self::assertContains($class, $expected, \sprintf('Type "%s" maps %s, which is not a document value object.', $name, $class));
        }
    }

    public function testBothBranchesRegisterTheSameNames(): void
    {
        self::assertSame(\array_keys(OrmRegistrar::types()), \array_keys(OdmRegistrar::types()));
    }

    /**
     * @return list<class-string> the non-abstract, non-internal value objects with a string form or a codec
     */
    private function valueObjectClasses(): array
    {
        $composites = [];
        foreach (Codecs::all() as $codec) {
            $composites[] = $codec->valueObjectClass();
        }

        $classes = [];
        foreach ($this->sourceClasses() as $reflection) {
            if (!$reflection->implementsInterface(ValueObject::class)) {
                continue;
            }

            $class = $reflection->getName();
            if (!$reflection->implementsInterface(StringConvertible::class)) {
                self::assertContains($class, $composites, \sprintf('Composite %s has no codec in Codecs::all().', $class));
            }

            $classes[] = $class;
        }

        \sort($classes);

        return $classes;
    }

    /**
     * @return iterable<int, ReflectionClass<object>>
     */
    private function sourceClasses(): iterable
    {
        $sexFile = new ReflectionClass(Sex::class)->getFileName();
        self::assertIsString($sexFile);
        $source = \dirname($sexFile);
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source, FilesystemIterator::SKIP_DOTS));

        foreach ($files as $file) {
            self::assertInstanceOf(SplFileInfo::class, $file);
            $path = $file->getPathname();
            if (!\str_ends_with($path, '.php')) {
                continue;
            }

            $class = 'MSSTC4PHP\\ValueObject\\Documents\\' . \str_replace('/', '\\', \substr($path, \strlen($source) + 1, -4));
            if (\str_starts_with($class, 'MSSTC4PHP\\ValueObject\\Documents\\Internal\\') || !\class_exists($class)) {
                continue;
            }

            $reflection = new ReflectionClass($class);
            if ($reflection->isAbstract()) {
                continue;
            }

            yield $reflection;
        }
    }

    /**
     * @param 'orm'|'odm' $branch
     *
     * @return array<string, class-string>
     */
    private function typeValueObjectClasses(string $branch): array
    {
        $classes = [];
        if ($branch === 'orm') {
            OrmRegistrar::registerAll();
            foreach (OrmRegistrar::types() as $name => $_) {
                $classes[$name] = $this->mappedClass(OrmType::getType($name));
            }

            return $classes;
        }

        OdmRegistrar::registerAll();
        foreach (OdmRegistrar::types() as $name => $_) {
            $classes[$name] = $this->mappedClass(OdmType::getType($name));
        }

        return $classes;
    }

    /**
     * @return class-string
     */
    private function mappedClass(object $type): string
    {
        if (\method_exists($type, 'valueObjectClass')) {
            $class = new ReflectionMethod($type, 'valueObjectClass')->invoke($type);
        } else {
            $codec = new ReflectionMethod($type, 'codec')->invoke($type);
            self::assertInstanceOf(PayloadCodec::class, $codec);
            $class = $codec->valueObjectClass();
        }

        self::assertIsString($class);
        self::assertTrue(\class_exists($class));

        return $class;
    }
}
