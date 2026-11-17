<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
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
}
