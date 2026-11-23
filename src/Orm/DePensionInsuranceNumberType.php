<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\DE\PensionInsuranceNumber;
use Override;

final class DePensionInsuranceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_de_pension_insurance_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return PensionInsuranceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return PensionInsuranceNumber::MAX_LENGTH;
    }
}
