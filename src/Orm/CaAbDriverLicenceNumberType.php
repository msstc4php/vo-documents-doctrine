<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\DriverLicence\AbDriverLicenceNumber;
use Override;

final class CaAbDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_ab_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return AbDriverLicenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
