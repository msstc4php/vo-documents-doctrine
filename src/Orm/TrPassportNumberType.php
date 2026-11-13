<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\TR\PassportNumber;
use Override;

final class TrPassportNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_tr_passport_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return PassportNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
