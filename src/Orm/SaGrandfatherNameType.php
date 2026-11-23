<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\SA\GrandfatherName;
use Override;

final class SaGrandfatherNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_sa_grandfather_name';

    #[Override]
    protected function valueObjectClass(): string
    {
        return GrandfatherName::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return GrandfatherName::MAX_LENGTH;
    }
}
