<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\MX\DriverLicence\MexDriverLicenceNumber;
use Override;

final class MxMexDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_mx_mex_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return MexDriverLicenceNumber::class;
    }
}
