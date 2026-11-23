<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\GB\FamilyName;
use Override;

final class GbFamilyNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_gb_family_name';

    #[Override]
    protected function valueObjectClass(): string
    {
        return FamilyName::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return FamilyName::MAX_LENGTH;
    }
}
