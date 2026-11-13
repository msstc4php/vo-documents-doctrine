<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\FR\Nir;
use Override;

final class FrNirType extends AbstractStringVoType
{
    public const string NAME = 'vod_fr_nir';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Nir::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 15;
    }
}
