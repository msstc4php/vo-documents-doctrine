<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\FR\PassportNumber;
use Override;

final class FrPassportNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_fr_passport_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return PassportNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return PassportNumber::MAX_LENGTH;
    }
}
