<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\ES\Nie;
use Override;

final class EsNieType extends AbstractStringVoType
{
    public const string NAME = 'vod_es_nie';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Nie::class;
    }
}
