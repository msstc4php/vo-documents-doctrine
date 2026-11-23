<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\NlHealthCardNumber;
use Override;

final class CaNlHealthCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_nl_health_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NlHealthCardNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return NlHealthCardNumber::MAX_LENGTH;
    }
}
