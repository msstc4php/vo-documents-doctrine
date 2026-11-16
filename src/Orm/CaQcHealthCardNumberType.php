<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\QcHealthCardNumber;
use Override;

final class CaQcHealthCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_qc_health_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return QcHealthCardNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 12;
    }
}
