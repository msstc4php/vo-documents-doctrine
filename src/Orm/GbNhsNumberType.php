<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\GB\NhsNumber;
use Override;

final class GbNhsNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_gb_nhs_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NhsNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 10;
    }
}
