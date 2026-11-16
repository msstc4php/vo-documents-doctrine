<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\Itin;
use Override;

final class UsItinType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_itin';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Itin::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
