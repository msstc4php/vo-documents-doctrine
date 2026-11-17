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
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrCnsType as OdmBrCnsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrCpfType as OdmBrCpfType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrDriverLicenceNumberType as OdmBrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrFamilyNameType as OdmBrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrGivenNameType as OdmBrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrNisType as OdmBrNisType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrPassportNumberType as OdmBrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrPersonNameType as OdmBrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrSpIdentityCardNumberType as OdmBrSpIdentityCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\BrVoterRegistrationNumberType as OdmBrVoterRegistrationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaAbDriverLicenceNumberType as OdmCaAbDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaAbHealthCardNumberType as OdmCaAbHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaBcDriverLicenceNumberType as OdmCaBcDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaBcHealthCardNumberType as OdmCaBcHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaFamilyNameType as OdmCaFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaGivenNameType as OdmCaGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaMbHealthCardNumberType as OdmCaMbHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaNbHealthCardNumberType as OdmCaNbHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaNlHealthCardNumberType as OdmCaNlHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaNsDriverLicenceNumberType as OdmCaNsDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaNsHealthCardNumberType as OdmCaNsHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaNtHealthCardNumberType as OdmCaNtHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaNuHealthCardNumberType as OdmCaNuHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaOnDriverLicenceNumberType as OdmCaOnDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaOnHealthCardNumberType as OdmCaOnHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaOnHealthCardVersionCodeType as OdmCaOnHealthCardVersionCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaPassportNumberType as OdmCaPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaPeHealthCardNumberType as OdmCaPeHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaPersonNameType as OdmCaPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaQcDriverLicenceNumberType as OdmCaQcDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaQcHealthCardNumberType as OdmCaQcHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaSkDriverLicenceNumberType as OdmCaSkDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaSkHealthCardNumberType as OdmCaSkHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaSocialInsuranceNumberType as OdmCaSocialInsuranceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CaYtHealthCardNumberType as OdmCaYtHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChAhvNumberType as OdmChAhvNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChDriverLicenceNumberType as OdmChDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChFamilyNameType as OdmChFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChGivenNameType as OdmChGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChIdentityDocumentNumberType as OdmChIdentityDocumentNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChPersonNameType as OdmChPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnCitizenIdentityNumberType as OdmCnCitizenIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnExitEntryPermitToHongKongMacauNumberType as OdmCnExitEntryPermitToHongKongMacauNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnExitEntryPermitToTaiwanNumberType as OdmCnExitEntryPermitToTaiwanNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnFamilyNameType as OdmCnFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnForeignerPermanentResidenceNumberType as OdmCnForeignerPermanentResidenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnGivenNameType as OdmCnGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnLegacyForeignerPermanentResidenceNumberType as OdmCnLegacyForeignerPermanentResidenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnOrdinaryPassportNumberType as OdmCnOrdinaryPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnPersonNameType as OdmCnPersonNameType;
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
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\IdFamilyCardNumberType as OdmIdFamilyCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\IdFullNameType as OdmIdFullNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\IdNationalIdentityNumberType as OdmIdNationalIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\IdPersonNameType as OdmIdPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\IdTaxpayerNumberType as OdmIdTaxpayerNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\InAadhaarNumberType as OdmInAadhaarNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\InAbhaNumberType as OdmInAbhaNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\InDevanagariGivenNameType as OdmInDevanagariGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\InDevanagariPersonNameType as OdmInDevanagariPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\InDevanagariSurnameType as OdmInDevanagariSurnameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\InGivenNameType as OdmInGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\InPassportNumberType as OdmInPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\InPermanentAccountNumberType as OdmInPermanentAccountNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\InPersonNameType as OdmInPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\InSurnameType as OdmInSurnameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItFamilyNameType as OdmItFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItFiscalCodeType as OdmItFiscalCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItGivenNameType as OdmItGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItPassportNumberType as OdmItPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItPersonNameType as OdmItPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\JpBasicPensionNumberType as OdmJpBasicPensionNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\JpDriverLicenceNumberType as OdmJpDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\JpFamilyNameReadingType as OdmJpFamilyNameReadingType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\JpFamilyNameType as OdmJpFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\JpGivenNameReadingType as OdmJpGivenNameReadingType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\JpGivenNameType as OdmJpGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\JpMyNumberType as OdmJpMyNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\JpPassportNumberType as OdmJpPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\JpPersonNameType as OdmJpPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\JpResidenceCardNumberType as OdmJpResidenceCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\KrDriverLicenceNumberType as OdmKrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\KrFamilyNameType as OdmKrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\KrForeignerRegistrationNumberType as OdmKrForeignerRegistrationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\KrGivenNameType as OdmKrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\KrMultipleEntryPassportNumberType as OdmKrMultipleEntryPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\KrPersonNameType as OdmKrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\KrResidentRegistrationNumberType as OdmKrResidentRegistrationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxCurpType as OdmMxCurpType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxElectorKeyType as OdmMxElectorKeyType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxFamilyNameType as OdmMxFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxGivenNameType as OdmMxGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxMexDriverLicenceNumberType as OdmMxMexDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxPersonNameType as OdmMxPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxRfcType as OdmMxRfcType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\MxSocialSecurityNumberType as OdmMxSocialSecurityNumberType;
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
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\SaFamilyNameType as OdmSaFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\SaFatherNameType as OdmSaFatherNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\SaGivenNameType as OdmSaGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\SaGrandfatherNameType as OdmSaGrandfatherNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\SaIqamaNumberType as OdmSaIqamaNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\SaNationalIdentityNumberType as OdmSaNationalIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\SaPersonNameType as OdmSaPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrFamilyNameType as OdmTrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrGivenNameType as OdmTrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrIdentityNumberType as OdmTrIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrPassportNumberType as OdmTrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrPersonNameType as OdmTrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TypeRegistrar as OdmRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsAlDlIdNumberType as OdmUsAlDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsAzDlIdNumberType as OdmUsAzDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsCoDlIdNumberType as OdmUsCoDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsCtDlIdNumberType as OdmUsCtDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsFamilyNameType as OdmUsFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsFlDlIdNumberType as OdmUsFlDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsGivenNameType as OdmUsGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsHiDlIdNumberType as OdmUsHiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsIaDlIdNumberType as OdmUsIaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsIdDlIdNumberType as OdmUsIdDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsIlDlIdNumberType as OdmUsIlDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsInDlIdNumberType as OdmUsInDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsItinType as OdmUsItinType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsKsDlIdNumberType as OdmUsKsDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsKyDlIdNumberType as OdmUsKyDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMaDlIdNumberType as OdmUsMaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMdDlIdNumberType as OdmUsMdDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMedicareBeneficiaryIdentifierType as OdmUsMedicareBeneficiaryIdentifierType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMeDlIdNumberType as OdmUsMeDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMiddleNameType as OdmUsMiddleNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMiDlIdNumberType as OdmUsMiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsMsDlIdNumberType as OdmUsMsDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsNdDlIdNumberType as OdmUsNdDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsNeDlIdNumberType as OdmUsNeDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsNjDlIdNumberType as OdmUsNjDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsNmDlIdNumberType as OdmUsNmDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsNyDlIdNumberType as OdmUsNyDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsOkDlIdNumberType as OdmUsOkDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsPaDlIdNumberType as OdmUsPaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsPassportBookNumberType as OdmUsPassportBookNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsPassportCardNumberType as OdmUsPassportCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsPersonNameType as OdmUsPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsRiDlIdNumberType as OdmUsRiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsSocialSecurityNumberType as OdmUsSocialSecurityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsTxDlIdNumberType as OdmUsTxDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsVtDlIdNumberType as OdmUsVtDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsWaDlIdNumberType as OdmUsWaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsWiDlIdNumberType as OdmUsWiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\UsWyDlIdNumberType as OdmUsWyDlIdNumberType;
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
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrCnsType as OrmBrCnsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrCpfType as OrmBrCpfType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrDriverLicenceNumberType as OrmBrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrFamilyNameType as OrmBrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrGivenNameType as OrmBrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrNisType as OrmBrNisType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrPassportNumberType as OrmBrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrPersonNameType as OrmBrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrSpIdentityCardNumberType as OrmBrSpIdentityCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrVoterRegistrationNumberType as OrmBrVoterRegistrationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaAbDriverLicenceNumberType as OrmCaAbDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaAbHealthCardNumberType as OrmCaAbHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaBcDriverLicenceNumberType as OrmCaBcDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaBcHealthCardNumberType as OrmCaBcHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaFamilyNameType as OrmCaFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaGivenNameType as OrmCaGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaMbHealthCardNumberType as OrmCaMbHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaNbHealthCardNumberType as OrmCaNbHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaNlHealthCardNumberType as OrmCaNlHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaNsDriverLicenceNumberType as OrmCaNsDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaNsHealthCardNumberType as OrmCaNsHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaNtHealthCardNumberType as OrmCaNtHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaNuHealthCardNumberType as OrmCaNuHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaOnDriverLicenceNumberType as OrmCaOnDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaOnHealthCardNumberType as OrmCaOnHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaOnHealthCardVersionCodeType as OrmCaOnHealthCardVersionCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaPassportNumberType as OrmCaPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaPeHealthCardNumberType as OrmCaPeHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaPersonNameType as OrmCaPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaQcDriverLicenceNumberType as OrmCaQcDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaQcHealthCardNumberType as OrmCaQcHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaSkDriverLicenceNumberType as OrmCaSkDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaSkHealthCardNumberType as OrmCaSkHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaSocialInsuranceNumberType as OrmCaSocialInsuranceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaYtHealthCardNumberType as OrmCaYtHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChAhvNumberType as OrmChAhvNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChDriverLicenceNumberType as OrmChDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChFamilyNameType as OrmChFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChGivenNameType as OrmChGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChIdentityDocumentNumberType as OrmChIdentityDocumentNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChPersonNameType as OrmChPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnCitizenIdentityNumberType as OrmCnCitizenIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnExitEntryPermitToHongKongMacauNumberType as OrmCnExitEntryPermitToHongKongMacauNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnExitEntryPermitToTaiwanNumberType as OrmCnExitEntryPermitToTaiwanNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnFamilyNameType as OrmCnFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnForeignerPermanentResidenceNumberType as OrmCnForeignerPermanentResidenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnGivenNameType as OrmCnGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnLegacyForeignerPermanentResidenceNumberType as OrmCnLegacyForeignerPermanentResidenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnOrdinaryPassportNumberType as OrmCnOrdinaryPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnPersonNameType as OrmCnPersonNameType;
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
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\IdFamilyCardNumberType as OrmIdFamilyCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\IdFullNameType as OrmIdFullNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\IdNationalIdentityNumberType as OrmIdNationalIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\IdPersonNameType as OrmIdPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\IdTaxpayerNumberType as OrmIdTaxpayerNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\InAadhaarNumberType as OrmInAadhaarNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\InAbhaNumberType as OrmInAbhaNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\InDevanagariGivenNameType as OrmInDevanagariGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\InDevanagariPersonNameType as OrmInDevanagariPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\InDevanagariSurnameType as OrmInDevanagariSurnameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\InGivenNameType as OrmInGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\InPassportNumberType as OrmInPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\InPermanentAccountNumberType as OrmInPermanentAccountNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\InPersonNameType as OrmInPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\InSurnameType as OrmInSurnameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItFamilyNameType as OrmItFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItFiscalCodeType as OrmItFiscalCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItGivenNameType as OrmItGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItPassportNumberType as OrmItPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItPersonNameType as OrmItPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpBasicPensionNumberType as OrmJpBasicPensionNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpDriverLicenceNumberType as OrmJpDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpFamilyNameReadingType as OrmJpFamilyNameReadingType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpFamilyNameType as OrmJpFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpGivenNameReadingType as OrmJpGivenNameReadingType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpGivenNameType as OrmJpGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpMyNumberType as OrmJpMyNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpPassportNumberType as OrmJpPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpPersonNameType as OrmJpPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpResidenceCardNumberType as OrmJpResidenceCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\KrDriverLicenceNumberType as OrmKrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\KrFamilyNameType as OrmKrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\KrForeignerRegistrationNumberType as OrmKrForeignerRegistrationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\KrGivenNameType as OrmKrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\KrMultipleEntryPassportNumberType as OrmKrMultipleEntryPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\KrPersonNameType as OrmKrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\KrResidentRegistrationNumberType as OrmKrResidentRegistrationNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxCurpType as OrmMxCurpType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxElectorKeyType as OrmMxElectorKeyType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxFamilyNameType as OrmMxFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxGivenNameType as OrmMxGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxMexDriverLicenceNumberType as OrmMxMexDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxPersonNameType as OrmMxPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxRfcType as OrmMxRfcType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxSocialSecurityNumberType as OrmMxSocialSecurityNumberType;
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
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\SaFamilyNameType as OrmSaFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\SaFatherNameType as OrmSaFatherNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\SaGivenNameType as OrmSaGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\SaGrandfatherNameType as OrmSaGrandfatherNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\SaIqamaNumberType as OrmSaIqamaNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\SaNationalIdentityNumberType as OrmSaNationalIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\SaPersonNameType as OrmSaPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrFamilyNameType as OrmTrFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrGivenNameType as OrmTrGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrIdentityNumberType as OrmTrIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrPassportNumberType as OrmTrPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrPersonNameType as OrmTrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TypeRegistrar as OrmRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsAlDlIdNumberType as OrmUsAlDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsAzDlIdNumberType as OrmUsAzDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsCoDlIdNumberType as OrmUsCoDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsCtDlIdNumberType as OrmUsCtDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsFamilyNameType as OrmUsFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsFlDlIdNumberType as OrmUsFlDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsGivenNameType as OrmUsGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsHiDlIdNumberType as OrmUsHiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsIaDlIdNumberType as OrmUsIaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsIdDlIdNumberType as OrmUsIdDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsIlDlIdNumberType as OrmUsIlDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsInDlIdNumberType as OrmUsInDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsItinType as OrmUsItinType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsKsDlIdNumberType as OrmUsKsDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsKyDlIdNumberType as OrmUsKyDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMaDlIdNumberType as OrmUsMaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMdDlIdNumberType as OrmUsMdDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMedicareBeneficiaryIdentifierType as OrmUsMedicareBeneficiaryIdentifierType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMeDlIdNumberType as OrmUsMeDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMiddleNameType as OrmUsMiddleNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMiDlIdNumberType as OrmUsMiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsMsDlIdNumberType as OrmUsMsDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsNdDlIdNumberType as OrmUsNdDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsNeDlIdNumberType as OrmUsNeDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsNjDlIdNumberType as OrmUsNjDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsNmDlIdNumberType as OrmUsNmDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsNyDlIdNumberType as OrmUsNyDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsOkDlIdNumberType as OrmUsOkDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsPaDlIdNumberType as OrmUsPaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsPassportBookNumberType as OrmUsPassportBookNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsPassportCardNumberType as OrmUsPassportCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsPersonNameType as OrmUsPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsRiDlIdNumberType as OrmUsRiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsSocialSecurityNumberType as OrmUsSocialSecurityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsTxDlIdNumberType as OrmUsTxDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsVtDlIdNumberType as OrmUsVtDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsWaDlIdNumberType as OrmUsWaDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsWiDlIdNumberType as OrmUsWiDlIdNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsWyDlIdNumberType as OrmUsWyDlIdNumberType;
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
#[UsesClass(OrmBrCnsType::class)]
#[UsesClass(OrmBrCpfType::class)]
#[UsesClass(OrmBrDriverLicenceNumberType::class)]
#[UsesClass(OrmBrSpIdentityCardNumberType::class)]
#[UsesClass(OrmBrNisType::class)]
#[UsesClass(OrmBrPassportNumberType::class)]
#[UsesClass(OrmBrVoterRegistrationNumberType::class)]
#[UsesClass(OrmCaAbDriverLicenceNumberType::class)]
#[UsesClass(OrmCaBcDriverLicenceNumberType::class)]
#[UsesClass(OrmCaNsDriverLicenceNumberType::class)]
#[UsesClass(OrmCaOnDriverLicenceNumberType::class)]
#[UsesClass(OrmCaQcDriverLicenceNumberType::class)]
#[UsesClass(OrmCaSkDriverLicenceNumberType::class)]
#[UsesClass(OrmCaAbHealthCardNumberType::class)]
#[UsesClass(OrmCaBcHealthCardNumberType::class)]
#[UsesClass(OrmCaMbHealthCardNumberType::class)]
#[UsesClass(OrmCaNbHealthCardNumberType::class)]
#[UsesClass(OrmCaNlHealthCardNumberType::class)]
#[UsesClass(OrmCaNsHealthCardNumberType::class)]
#[UsesClass(OrmCaNtHealthCardNumberType::class)]
#[UsesClass(OrmCaNuHealthCardNumberType::class)]
#[UsesClass(OrmCaOnHealthCardNumberType::class)]
#[UsesClass(OrmCaOnHealthCardVersionCodeType::class)]
#[UsesClass(OrmCaPeHealthCardNumberType::class)]
#[UsesClass(OrmCaQcHealthCardNumberType::class)]
#[UsesClass(OrmCaSkHealthCardNumberType::class)]
#[UsesClass(OrmCaYtHealthCardNumberType::class)]
#[UsesClass(OrmCaPassportNumberType::class)]
#[UsesClass(OrmCaSocialInsuranceNumberType::class)]
#[UsesClass(OrmMxCurpType::class)]
#[UsesClass(OrmMxMexDriverLicenceNumberType::class)]
#[UsesClass(OrmMxElectorKeyType::class)]
#[UsesClass(OrmMxRfcType::class)]
#[UsesClass(OrmMxSocialSecurityNumberType::class)]
#[UsesClass(OrmUsAlDlIdNumberType::class)]
#[UsesClass(OrmUsAzDlIdNumberType::class)]
#[UsesClass(OrmUsCoDlIdNumberType::class)]
#[UsesClass(OrmUsCtDlIdNumberType::class)]
#[UsesClass(OrmUsFlDlIdNumberType::class)]
#[UsesClass(OrmUsHiDlIdNumberType::class)]
#[UsesClass(OrmUsIaDlIdNumberType::class)]
#[UsesClass(OrmUsIdDlIdNumberType::class)]
#[UsesClass(OrmUsIlDlIdNumberType::class)]
#[UsesClass(OrmUsInDlIdNumberType::class)]
#[UsesClass(OrmUsKsDlIdNumberType::class)]
#[UsesClass(OrmUsKyDlIdNumberType::class)]
#[UsesClass(OrmUsMaDlIdNumberType::class)]
#[UsesClass(OrmUsMdDlIdNumberType::class)]
#[UsesClass(OrmUsMeDlIdNumberType::class)]
#[UsesClass(OrmUsMiDlIdNumberType::class)]
#[UsesClass(OrmUsMsDlIdNumberType::class)]
#[UsesClass(OrmUsNdDlIdNumberType::class)]
#[UsesClass(OrmUsNeDlIdNumberType::class)]
#[UsesClass(OrmUsNjDlIdNumberType::class)]
#[UsesClass(OrmUsNmDlIdNumberType::class)]
#[UsesClass(OrmUsNyDlIdNumberType::class)]
#[UsesClass(OrmUsOkDlIdNumberType::class)]
#[UsesClass(OrmUsPaDlIdNumberType::class)]
#[UsesClass(OrmUsRiDlIdNumberType::class)]
#[UsesClass(OrmUsTxDlIdNumberType::class)]
#[UsesClass(OrmUsVtDlIdNumberType::class)]
#[UsesClass(OrmUsWaDlIdNumberType::class)]
#[UsesClass(OrmUsWiDlIdNumberType::class)]
#[UsesClass(OrmUsWyDlIdNumberType::class)]
#[UsesClass(OrmUsItinType::class)]
#[UsesClass(OrmUsMedicareBeneficiaryIdentifierType::class)]
#[UsesClass(OrmUsPassportBookNumberType::class)]
#[UsesClass(OrmUsPassportCardNumberType::class)]
#[UsesClass(OrmUsSocialSecurityNumberType::class)]
#[UsesClass(OrmBrFamilyNameType::class)]
#[UsesClass(OrmBrGivenNameType::class)]
#[UsesClass(OrmBrPersonNameType::class)]
#[UsesClass(OrmCaFamilyNameType::class)]
#[UsesClass(OrmCaGivenNameType::class)]
#[UsesClass(OrmCaPersonNameType::class)]
#[UsesClass(OrmMxFamilyNameType::class)]
#[UsesClass(OrmMxGivenNameType::class)]
#[UsesClass(OrmMxPersonNameType::class)]
#[UsesClass(OrmUsFamilyNameType::class)]
#[UsesClass(OrmUsGivenNameType::class)]
#[UsesClass(OrmUsMiddleNameType::class)]
#[UsesClass(OrmUsPersonNameType::class)]
#[UsesClass(OdmBrCnsType::class)]
#[UsesClass(OdmBrCpfType::class)]
#[UsesClass(OdmBrDriverLicenceNumberType::class)]
#[UsesClass(OdmBrSpIdentityCardNumberType::class)]
#[UsesClass(OdmBrNisType::class)]
#[UsesClass(OdmBrPassportNumberType::class)]
#[UsesClass(OdmBrVoterRegistrationNumberType::class)]
#[UsesClass(OdmCaAbDriverLicenceNumberType::class)]
#[UsesClass(OdmCaBcDriverLicenceNumberType::class)]
#[UsesClass(OdmCaNsDriverLicenceNumberType::class)]
#[UsesClass(OdmCaOnDriverLicenceNumberType::class)]
#[UsesClass(OdmCaQcDriverLicenceNumberType::class)]
#[UsesClass(OdmCaSkDriverLicenceNumberType::class)]
#[UsesClass(OdmCaAbHealthCardNumberType::class)]
#[UsesClass(OdmCaBcHealthCardNumberType::class)]
#[UsesClass(OdmCaMbHealthCardNumberType::class)]
#[UsesClass(OdmCaNbHealthCardNumberType::class)]
#[UsesClass(OdmCaNlHealthCardNumberType::class)]
#[UsesClass(OdmCaNsHealthCardNumberType::class)]
#[UsesClass(OdmCaNtHealthCardNumberType::class)]
#[UsesClass(OdmCaNuHealthCardNumberType::class)]
#[UsesClass(OdmCaOnHealthCardNumberType::class)]
#[UsesClass(OdmCaOnHealthCardVersionCodeType::class)]
#[UsesClass(OdmCaPeHealthCardNumberType::class)]
#[UsesClass(OdmCaQcHealthCardNumberType::class)]
#[UsesClass(OdmCaSkHealthCardNumberType::class)]
#[UsesClass(OdmCaYtHealthCardNumberType::class)]
#[UsesClass(OdmCaPassportNumberType::class)]
#[UsesClass(OdmCaSocialInsuranceNumberType::class)]
#[UsesClass(OdmMxCurpType::class)]
#[UsesClass(OdmMxMexDriverLicenceNumberType::class)]
#[UsesClass(OdmMxElectorKeyType::class)]
#[UsesClass(OdmMxRfcType::class)]
#[UsesClass(OdmMxSocialSecurityNumberType::class)]
#[UsesClass(OdmUsAlDlIdNumberType::class)]
#[UsesClass(OdmUsAzDlIdNumberType::class)]
#[UsesClass(OdmUsCoDlIdNumberType::class)]
#[UsesClass(OdmUsCtDlIdNumberType::class)]
#[UsesClass(OdmUsFlDlIdNumberType::class)]
#[UsesClass(OdmUsHiDlIdNumberType::class)]
#[UsesClass(OdmUsIaDlIdNumberType::class)]
#[UsesClass(OdmUsIdDlIdNumberType::class)]
#[UsesClass(OdmUsIlDlIdNumberType::class)]
#[UsesClass(OdmUsInDlIdNumberType::class)]
#[UsesClass(OdmUsKsDlIdNumberType::class)]
#[UsesClass(OdmUsKyDlIdNumberType::class)]
#[UsesClass(OdmUsMaDlIdNumberType::class)]
#[UsesClass(OdmUsMdDlIdNumberType::class)]
#[UsesClass(OdmUsMeDlIdNumberType::class)]
#[UsesClass(OdmUsMiDlIdNumberType::class)]
#[UsesClass(OdmUsMsDlIdNumberType::class)]
#[UsesClass(OdmUsNdDlIdNumberType::class)]
#[UsesClass(OdmUsNeDlIdNumberType::class)]
#[UsesClass(OdmUsNjDlIdNumberType::class)]
#[UsesClass(OdmUsNmDlIdNumberType::class)]
#[UsesClass(OdmUsNyDlIdNumberType::class)]
#[UsesClass(OdmUsOkDlIdNumberType::class)]
#[UsesClass(OdmUsPaDlIdNumberType::class)]
#[UsesClass(OdmUsRiDlIdNumberType::class)]
#[UsesClass(OdmUsTxDlIdNumberType::class)]
#[UsesClass(OdmUsVtDlIdNumberType::class)]
#[UsesClass(OdmUsWaDlIdNumberType::class)]
#[UsesClass(OdmUsWiDlIdNumberType::class)]
#[UsesClass(OdmUsWyDlIdNumberType::class)]
#[UsesClass(OdmUsItinType::class)]
#[UsesClass(OdmUsMedicareBeneficiaryIdentifierType::class)]
#[UsesClass(OdmUsPassportBookNumberType::class)]
#[UsesClass(OdmUsPassportCardNumberType::class)]
#[UsesClass(OdmUsSocialSecurityNumberType::class)]
#[UsesClass(OdmBrFamilyNameType::class)]
#[UsesClass(OdmBrGivenNameType::class)]
#[UsesClass(OdmBrPersonNameType::class)]
#[UsesClass(OdmCaFamilyNameType::class)]
#[UsesClass(OdmCaGivenNameType::class)]
#[UsesClass(OdmCaPersonNameType::class)]
#[UsesClass(OdmMxFamilyNameType::class)]
#[UsesClass(OdmMxGivenNameType::class)]
#[UsesClass(OdmMxPersonNameType::class)]
#[UsesClass(OdmUsFamilyNameType::class)]
#[UsesClass(OdmUsGivenNameType::class)]
#[UsesClass(OdmUsMiddleNameType::class)]
#[UsesClass(OdmUsPersonNameType::class)]
#[UsesClass(OrmCnCitizenIdentityNumberType::class)]
#[UsesClass(OrmCnExitEntryPermitToHongKongMacauNumberType::class)]
#[UsesClass(OrmCnExitEntryPermitToTaiwanNumberType::class)]
#[UsesClass(OrmCnForeignerPermanentResidenceNumberType::class)]
#[UsesClass(OrmCnLegacyForeignerPermanentResidenceNumberType::class)]
#[UsesClass(OrmCnOrdinaryPassportNumberType::class)]
#[UsesClass(OrmIdFamilyCardNumberType::class)]
#[UsesClass(OrmIdNationalIdentityNumberType::class)]
#[UsesClass(OrmIdTaxpayerNumberType::class)]
#[UsesClass(OrmInAadhaarNumberType::class)]
#[UsesClass(OrmInAbhaNumberType::class)]
#[UsesClass(OrmInPassportNumberType::class)]
#[UsesClass(OrmInPermanentAccountNumberType::class)]
#[UsesClass(OrmJpBasicPensionNumberType::class)]
#[UsesClass(OrmJpDriverLicenceNumberType::class)]
#[UsesClass(OrmJpMyNumberType::class)]
#[UsesClass(OrmJpPassportNumberType::class)]
#[UsesClass(OrmJpResidenceCardNumberType::class)]
#[UsesClass(OrmKrDriverLicenceNumberType::class)]
#[UsesClass(OrmKrForeignerRegistrationNumberType::class)]
#[UsesClass(OrmKrMultipleEntryPassportNumberType::class)]
#[UsesClass(OrmKrResidentRegistrationNumberType::class)]
#[UsesClass(OrmSaIqamaNumberType::class)]
#[UsesClass(OrmSaNationalIdentityNumberType::class)]
#[UsesClass(OrmCnFamilyNameType::class)]
#[UsesClass(OrmCnGivenNameType::class)]
#[UsesClass(OrmIdFullNameType::class)]
#[UsesClass(OrmInGivenNameType::class)]
#[UsesClass(OrmInSurnameType::class)]
#[UsesClass(OrmInDevanagariGivenNameType::class)]
#[UsesClass(OrmInDevanagariSurnameType::class)]
#[UsesClass(OrmJpFamilyNameType::class)]
#[UsesClass(OrmJpGivenNameType::class)]
#[UsesClass(OrmJpFamilyNameReadingType::class)]
#[UsesClass(OrmJpGivenNameReadingType::class)]
#[UsesClass(OrmKrFamilyNameType::class)]
#[UsesClass(OrmKrGivenNameType::class)]
#[UsesClass(OrmSaGivenNameType::class)]
#[UsesClass(OrmSaFatherNameType::class)]
#[UsesClass(OrmSaGrandfatherNameType::class)]
#[UsesClass(OrmSaFamilyNameType::class)]
#[UsesClass(OrmCnPersonNameType::class)]
#[UsesClass(OrmIdPersonNameType::class)]
#[UsesClass(OrmInPersonNameType::class)]
#[UsesClass(OrmInDevanagariPersonNameType::class)]
#[UsesClass(OrmJpPersonNameType::class)]
#[UsesClass(OrmKrPersonNameType::class)]
#[UsesClass(OrmSaPersonNameType::class)]
#[UsesClass(OdmCnCitizenIdentityNumberType::class)]
#[UsesClass(OdmCnExitEntryPermitToHongKongMacauNumberType::class)]
#[UsesClass(OdmCnExitEntryPermitToTaiwanNumberType::class)]
#[UsesClass(OdmCnForeignerPermanentResidenceNumberType::class)]
#[UsesClass(OdmCnLegacyForeignerPermanentResidenceNumberType::class)]
#[UsesClass(OdmCnOrdinaryPassportNumberType::class)]
#[UsesClass(OdmIdFamilyCardNumberType::class)]
#[UsesClass(OdmIdNationalIdentityNumberType::class)]
#[UsesClass(OdmIdTaxpayerNumberType::class)]
#[UsesClass(OdmInAadhaarNumberType::class)]
#[UsesClass(OdmInAbhaNumberType::class)]
#[UsesClass(OdmInPassportNumberType::class)]
#[UsesClass(OdmInPermanentAccountNumberType::class)]
#[UsesClass(OdmJpBasicPensionNumberType::class)]
#[UsesClass(OdmJpDriverLicenceNumberType::class)]
#[UsesClass(OdmJpMyNumberType::class)]
#[UsesClass(OdmJpPassportNumberType::class)]
#[UsesClass(OdmJpResidenceCardNumberType::class)]
#[UsesClass(OdmKrDriverLicenceNumberType::class)]
#[UsesClass(OdmKrForeignerRegistrationNumberType::class)]
#[UsesClass(OdmKrMultipleEntryPassportNumberType::class)]
#[UsesClass(OdmKrResidentRegistrationNumberType::class)]
#[UsesClass(OdmSaIqamaNumberType::class)]
#[UsesClass(OdmSaNationalIdentityNumberType::class)]
#[UsesClass(OdmCnFamilyNameType::class)]
#[UsesClass(OdmCnGivenNameType::class)]
#[UsesClass(OdmIdFullNameType::class)]
#[UsesClass(OdmInGivenNameType::class)]
#[UsesClass(OdmInSurnameType::class)]
#[UsesClass(OdmInDevanagariGivenNameType::class)]
#[UsesClass(OdmInDevanagariSurnameType::class)]
#[UsesClass(OdmJpFamilyNameType::class)]
#[UsesClass(OdmJpGivenNameType::class)]
#[UsesClass(OdmJpFamilyNameReadingType::class)]
#[UsesClass(OdmJpGivenNameReadingType::class)]
#[UsesClass(OdmKrFamilyNameType::class)]
#[UsesClass(OdmKrGivenNameType::class)]
#[UsesClass(OdmSaGivenNameType::class)]
#[UsesClass(OdmSaFatherNameType::class)]
#[UsesClass(OdmSaGrandfatherNameType::class)]
#[UsesClass(OdmSaFamilyNameType::class)]
#[UsesClass(OdmCnPersonNameType::class)]
#[UsesClass(OdmIdPersonNameType::class)]
#[UsesClass(OdmInPersonNameType::class)]
#[UsesClass(OdmInDevanagariPersonNameType::class)]
#[UsesClass(OdmJpPersonNameType::class)]
#[UsesClass(OdmKrPersonNameType::class)]
#[UsesClass(OdmSaPersonNameType::class)]
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
            self::assertContains(
                $class,
                $expected,
                \sprintf('Type "%s" maps %s, which is not a document value object.', $name, $class),
            );
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
                self::assertContains(
                    $class,
                    $composites,
                    \sprintf('Composite %s has no codec in Codecs::all().', $class),
                );
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

            $class = 'MSSTC4PHP\\ValueObject\\Documents\\' . \str_replace(
                '/',
                '\\',
                \substr($path, \strlen($source) + 1, -4),
            );
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
