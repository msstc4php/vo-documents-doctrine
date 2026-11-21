<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Icao\Mrz\MachineReadableZone;
use Override;

final class IcaoMrzType extends AbstractStringVoType
{
    public const string NAME = 'vod_icao_mrz';

    /**
     * Three lines of 30 characters and two line breaks, the longest MRZ (TD1).
     */
    private const int LENGTH = 92;

    #[Override]
    protected function valueObjectClass(): string
    {
        return MachineReadableZone::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return self::LENGTH;
    }
}
