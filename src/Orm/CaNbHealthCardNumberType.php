<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\NbHealthCardNumber;
use Override;

final class CaNbHealthCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_nb_health_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NbHealthCardNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return NbHealthCardNumber::MAX_LENGTH;
    }
}
