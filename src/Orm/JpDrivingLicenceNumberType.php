<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\JP\DrivingLicenceNumber;
use Override;

final class JpDrivingLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_jp_driving_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return DrivingLicenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 12;
    }
}
