<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\GB\HealthAndCareNumber;
use Override;

final class GbHealthAndCareNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_gb_health_and_care_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return HealthAndCareNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return HealthAndCareNumber::MAX_LENGTH;
    }
}
