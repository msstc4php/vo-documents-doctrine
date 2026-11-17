<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\JP\MyNumber;
use Override;

final class JpMyNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_jp_my_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return MyNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 12;
    }
}
