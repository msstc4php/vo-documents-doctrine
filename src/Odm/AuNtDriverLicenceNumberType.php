<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\NtDriverLicenceNumber;
use Override;

final class AuNtDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_au_nt_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NtDriverLicenceNumber::class;
    }
}
