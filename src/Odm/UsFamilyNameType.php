<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\US\FamilyName;
use Override;

final class UsFamilyNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_family_name';

    #[Override]
    protected function valueObjectClass(): string
    {
        return FamilyName::class;
    }
}
