<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CN\OrdinaryPassportNumber;
use Override;

final class CnOrdinaryPassportNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_cn_ordinary_passport_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return OrdinaryPassportNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return OrdinaryPassportNumber::MAX_LENGTH;
    }
}
