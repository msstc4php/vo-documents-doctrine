<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\JP\BasicPensionNumber;
use Override;

final class JpBasicPensionNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_jp_basic_pension_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return BasicPensionNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return BasicPensionNumber::MAX_LENGTH;
    }
}
