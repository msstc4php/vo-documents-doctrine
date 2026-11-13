<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\GB\NorthernIrelandDriverLicenceNumber;
use Override;

final class GbNorthernIrelandDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_gb_northern_ireland_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NorthernIrelandDriverLicenceNumber::class;
    }
}
