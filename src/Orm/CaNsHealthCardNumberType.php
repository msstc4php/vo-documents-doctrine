<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\NsHealthCardNumber;
use Override;

final class CaNsHealthCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_ns_health_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NsHealthCardNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return NsHealthCardNumber::MAX_LENGTH;
    }
}
