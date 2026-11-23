<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\IN\Surname;
use Override;

final class InSurnameType extends AbstractStringVoType
{
    public const string NAME = 'vod_in_surname';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Surname::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return Surname::MAX_LENGTH;
    }
}
