<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\IN\AbhaNumber;
use Override;

final class InAbhaNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_in_abha_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return AbhaNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 14;
    }
}
