<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CH\AhvNumber;
use Override;

final class ChAhvNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ch_ahv_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return AhvNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return AhvNumber::MAX_LENGTH;
    }
}
