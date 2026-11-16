<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\MbHealthCardNumber;
use Override;

final class CaMbHealthCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_mb_health_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return MbHealthCardNumber::class;
    }
}
