<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\IT\PassportNumber;
use Override;

final class ItPassportNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_it_passport_number';

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
