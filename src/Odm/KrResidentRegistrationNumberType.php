<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\KR\ResidentRegistrationNumber;
use Override;

final class KrResidentRegistrationNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_kr_resident_registration_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return ResidentRegistrationNumber::class;
    }
}
