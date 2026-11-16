<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\PassportCardNumber;
use Override;

final class UsPassportCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_passport_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return PassportCardNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
