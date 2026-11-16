<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\DriverLicence\SkDriverLicenceNumber;
use Override;

final class CaSkDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_sk_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return SkDriverLicenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 8;
    }
}
