<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\TasDriverLicenceNumber;
use Override;

final class AuTasDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_au_tas_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return TasDriverLicenceNumber::class;
    }
}
