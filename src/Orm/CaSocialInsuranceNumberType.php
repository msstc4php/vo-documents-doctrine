<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\SocialInsuranceNumber;
use Override;

final class CaSocialInsuranceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_social_insurance_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return SocialInsuranceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return SocialInsuranceNumber::MAX_LENGTH;
    }
}
