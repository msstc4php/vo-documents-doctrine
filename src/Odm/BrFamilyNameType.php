<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\BR\FamilyName;
use Override;

final class BrFamilyNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_br_family_name';

    #[Override]
    protected function valueObjectClass(): string
    {
        return FamilyName::class;
    }
}
