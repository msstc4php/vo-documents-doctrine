<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\DE\IdentityCardNumber;
use Override;

final class DeIdentityCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_de_identity_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return IdentityCardNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
