<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\BR\IdentityCard\SpIdentityCardNumber;
use Override;

final class BrSpIdentityCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_br_sp_identity_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return SpIdentityCardNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return SpIdentityCardNumber::MAX_LENGTH;
    }
}
