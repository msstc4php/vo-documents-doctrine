<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\QldDriverLicenceNumber;
use Override;

final class AuQldDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_au_qld_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return QldDriverLicenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
