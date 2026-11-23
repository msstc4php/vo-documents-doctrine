<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\GB\GreatBritainDriverLicenceNumber;
use Override;

final class GbGreatBritainDriverLicenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_gb_great_britain_driver_licence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return GreatBritainDriverLicenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return GreatBritainDriverLicenceNumber::MAX_LENGTH;
    }
}
