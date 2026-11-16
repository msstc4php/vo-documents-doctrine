<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\BcHealthCardNumber;
use Override;

final class CaBcHealthCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_bc_health_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return BcHealthCardNumber::class;
    }
}
