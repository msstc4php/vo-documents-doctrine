<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\KR\MultipleEntryPassportNumber;
use Override;

final class KrMultipleEntryPassportNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_kr_multiple_entry_passport_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return MultipleEntryPassportNumber::class;
    }
}
