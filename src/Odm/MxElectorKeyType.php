<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\MX\ElectorKey;
use Override;

final class MxElectorKeyType extends AbstractStringVoType
{
    public const string NAME = 'vod_mx_elector_key';

    #[Override]
    protected function valueObjectClass(): string
    {
        return ElectorKey::class;
    }
}
