<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\NuHealthCardNumber;
use Override;

final class CaNuHealthCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_nu_health_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NuHealthCardNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return NuHealthCardNumber::MAX_LENGTH;
    }
}
