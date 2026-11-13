<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\AbstractNamePart;
use MSSTC4PHP\ValueObject\Documents\Name\ES\GivenName;
use Override;

final class EsGivenNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_es_given_name';

    #[Override]
    protected function valueObjectClass(): string
    {
        return GivenName::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return AbstractNamePart::MAX_LENGTH;
    }
}
