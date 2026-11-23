<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\VicDriverLicenceNumber;
use Override;

final class AuVicDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_au_vic_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return VicDriverLicenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return VicDriverLicenceNumber::MAX_LENGTH;
    }
}
