<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\WaDriverLicenceNumber;
use Override;

final class AuWaDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_au_wa_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return WaDriverLicenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 7;
    }
}
