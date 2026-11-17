<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\IN\AadhaarNumber;
use Override;

final class InAadhaarNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_in_aadhaar_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return AadhaarNumber::class;
    }
}
