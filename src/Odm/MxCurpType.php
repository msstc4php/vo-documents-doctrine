<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\MX\Curp;
use Override;

final class MxCurpType extends AbstractStringVoType
{
    public const string NAME = 'vod_mx_curp';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Curp::class;
    }
}
