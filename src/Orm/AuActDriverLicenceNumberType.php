<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\ActDriverLicenceNumber;
use Override;

final class AuActDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_au_act_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return ActDriverLicenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 10;
    }
}
