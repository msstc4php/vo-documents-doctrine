<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\US\MiddleName;
use Override;

final class UsMiddleNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_middle_name';

    #[Override]
    protected function valueObjectClass(): string
    {
        return MiddleName::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return MiddleName::MAX_LENGTH;
    }
}
