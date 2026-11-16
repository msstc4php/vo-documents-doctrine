<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\DriverLicence\NsDriverLicenceNumber;
use Override;

final class CaNsDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_ns_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NsDriverLicenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 14;
    }
}
