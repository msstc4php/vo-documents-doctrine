<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\RU\PassportIssuingUnitCode;
use Override;

final class RuPassportIssuingUnitCodeType extends AbstractStringVoType
{
    public const string NAME = 'vod_ru_passport_issuing_unit_code';

    #[Override]
    protected function valueObjectClass(): string
    {
        return PassportIssuingUnitCode::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 6;
    }
}
