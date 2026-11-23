<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\RU\InternalPassportNumber;
use Override;

final class RuInternalPassportNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ru_internal_passport_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return InternalPassportNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return InternalPassportNumber::MAX_LENGTH;
    }
}
