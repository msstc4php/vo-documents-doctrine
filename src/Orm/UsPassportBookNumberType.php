<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\PassportBookNumber;
use Override;

final class UsPassportBookNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_passport_book_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return PassportBookNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
