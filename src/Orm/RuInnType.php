<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Inn;
use Override;

final class RuInnType extends AbstractStringVoType
{
    public const string NAME = 'vod_ru_inn';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Inn::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 12;
    }
}
