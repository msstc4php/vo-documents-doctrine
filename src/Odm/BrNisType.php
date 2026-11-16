<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\BR\Nis;
use Override;

final class BrNisType extends AbstractStringVoType
{
    public const string NAME = 'vod_br_nis';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Nis::class;
    }
}
