<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\TR\IdentityNumber;
use Override;

final class TrIdentityNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_tr_identity_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return IdentityNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return IdentityNumber::MAX_LENGTH;
    }
}
