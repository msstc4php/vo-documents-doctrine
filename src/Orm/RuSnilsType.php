<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
use Override;

final class RuSnilsType extends AbstractStringVoType
{
    public const string NAME = 'vod_ru_snils';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Snils::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return Snils::MAX_LENGTH;
    }
}
