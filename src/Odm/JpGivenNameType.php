<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\JP\GivenName;
use Override;

final class JpGivenNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_jp_given_name';

    #[Override]
    protected function valueObjectClass(): string
    {
        return GivenName::class;
    }
}
