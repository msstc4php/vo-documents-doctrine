<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\GB\NationalInsuranceNumber;
use Override;

final class GbNationalInsuranceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_gb_national_insurance_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NationalInsuranceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
