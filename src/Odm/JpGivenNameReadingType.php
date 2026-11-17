<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\JP\GivenNameReading;
use Override;

final class JpGivenNameReadingType extends AbstractStringVoType
{
    public const string NAME = 'vod_jp_given_name_reading';

    #[Override]
    protected function valueObjectClass(): string
    {
        return GivenNameReading::class;
    }
}
