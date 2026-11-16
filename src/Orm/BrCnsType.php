<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\BR\Cns;
use Override;

final class BrCnsType extends AbstractStringVoType
{
    public const string NAME = 'vod_br_cns';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Cns::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 15;
    }
}
