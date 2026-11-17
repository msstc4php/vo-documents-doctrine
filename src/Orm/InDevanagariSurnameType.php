<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\AbstractNamePart;
use MSSTC4PHP\ValueObject\Documents\Name\IN\Devanagari\Surname;
use Override;

final class InDevanagariSurnameType extends AbstractStringVoType
{
    public const string NAME = 'vod_in_devanagari_surname';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Surname::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return AbstractNamePart::MAX_LENGTH;
    }
}
