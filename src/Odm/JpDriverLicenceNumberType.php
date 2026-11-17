<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\JP\DriverLicenceNumber;
use Override;

final class JpDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_jp_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return DriverLicenceNumber::class;
    }
}
