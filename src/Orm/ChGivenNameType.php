<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\CH\GivenName;
use Override;

final class ChGivenNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_ch_given_name';

    #[Override]
    protected function valueObjectClass(): string
    {
        return GivenName::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return GivenName::MAX_LENGTH;
    }
}
