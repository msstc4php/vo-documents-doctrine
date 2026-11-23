<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Icao\Mrz\MachineReadableZone;
use Override;

final class IcaoMrzType extends AbstractStringVoType
{
    public const string NAME = 'vod_icao_mrz';

    #[Override]
    protected function valueObjectClass(): string
    {
        return MachineReadableZone::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return MachineReadableZone::MAX_LENGTH;
    }
}
