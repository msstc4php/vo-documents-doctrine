<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\RU\InternationalPassportNumber;
use Override;

final class RuInternationalPassportNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ru_international_passport_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return InternationalPassportNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
