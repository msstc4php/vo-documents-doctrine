<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\SA\GivenName;
use Override;

final class SaGivenNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_sa_given_name';

    #[Override]
    protected function valueObjectClass(): string
    {
        return GivenName::class;
    }
}
