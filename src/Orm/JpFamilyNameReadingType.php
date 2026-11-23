<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\JP\FamilyNameReading;
use Override;

final class JpFamilyNameReadingType extends AbstractStringVoType
{
    public const string NAME = 'vod_jp_family_name_reading';

    #[Override]
    protected function valueObjectClass(): string
    {
        return FamilyNameReading::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return FamilyNameReading::MAX_LENGTH;
    }
}
