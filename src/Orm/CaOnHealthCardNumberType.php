<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\OnHealthCardNumber;
use Override;

final class CaOnHealthCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_on_health_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return OnHealthCardNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 10;
    }
}
