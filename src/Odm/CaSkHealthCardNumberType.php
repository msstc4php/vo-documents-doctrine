<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\SkHealthCardNumber;
use Override;

final class CaSkHealthCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_sk_health_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return SkHealthCardNumber::class;
    }
}
