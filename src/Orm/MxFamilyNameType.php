<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\MX\FamilyName;
use Override;

final class MxFamilyNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_mx_family_name';

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
