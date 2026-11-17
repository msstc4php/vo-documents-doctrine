<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\KR\DriverLicenceNumber;
use Override;

final class KrDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_kr_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return DriverLicenceNumber::class;
    }
}
