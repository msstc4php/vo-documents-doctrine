<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Icao\PersonName;
use Override;

final class IcaoPersonNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_icao_person_name';

    #[Override]
    protected function valueObjectClass(): string
    {
        return PersonName::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 255;
    }
}
