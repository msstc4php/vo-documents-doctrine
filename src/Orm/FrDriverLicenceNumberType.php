<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\FR\DriverLicenceNumber;
use Override;

final class FrDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_fr_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return DriverLicenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return DriverLicenceNumber::MAX_LENGTH;
    }
}
