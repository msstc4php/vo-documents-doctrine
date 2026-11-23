<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\PeHealthCardNumber;
use Override;

final class CaPeHealthCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_pe_health_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return PeHealthCardNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return PeHealthCardNumber::MAX_LENGTH;
    }
}
