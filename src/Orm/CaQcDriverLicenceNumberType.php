<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\DriverLicence\QcDriverLicenceNumber;
use Override;

final class CaQcDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_qc_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return QcDriverLicenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return QcDriverLicenceNumber::MAX_LENGTH;
    }
}
