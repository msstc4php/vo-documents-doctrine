<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\YtHealthCardNumber;
use Override;

final class CaYtHealthCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_yt_health_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return YtHealthCardNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
