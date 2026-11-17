<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\AbstractNamePart;
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

    #[Override]
    protected function columnLength(): int
    {
        return AbstractNamePart::MAX_LENGTH;
    }
}
