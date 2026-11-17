<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\ID\FullName;
use Override;

final class IdFullNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_id_full_name';

    #[Override]
    protected function valueObjectClass(): string
    {
        return FullName::class;
    }
}
