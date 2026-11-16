<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\DriverLicence\OnDriverLicenceNumber;
use Override;

final class CaOnDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_on_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return OnDriverLicenceNumber::class;
    }
}
