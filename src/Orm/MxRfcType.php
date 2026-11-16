<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\MX\Rfc;
use Override;

final class MxRfcType extends AbstractStringVoType
{
    public const string NAME = 'vod_mx_rfc';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Rfc::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 13;
    }
}
