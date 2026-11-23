<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\ES\Dni;
use Override;

final class EsDniType extends AbstractStringVoType
{
    public const string NAME = 'vod_es_dni';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Dni::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return Dni::MAX_LENGTH;
    }
}
