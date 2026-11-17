<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
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
}
