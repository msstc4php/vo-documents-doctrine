<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\GB\ChiNumber;
use Override;

final class GbChiNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_gb_chi_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return ChiNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 10;
    }
}
