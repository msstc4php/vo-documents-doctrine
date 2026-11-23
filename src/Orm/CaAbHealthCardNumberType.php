<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\AbHealthCardNumber;
use Override;

final class CaAbHealthCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_ab_health_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return AbHealthCardNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return AbHealthCardNumber::MAX_LENGTH;
    }
}
