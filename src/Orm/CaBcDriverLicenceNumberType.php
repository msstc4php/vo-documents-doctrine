<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\DriverLicence\BcDriverLicenceNumber;
use Override;

final class CaBcDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_bc_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return BcDriverLicenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return BcDriverLicenceNumber::MAX_LENGTH;
    }
}
