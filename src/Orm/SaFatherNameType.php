<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\SA\FatherName;
use Override;

final class SaFatherNameType extends AbstractStringVoType
{
    public const string NAME = 'vod_sa_father_name';

    #[Override]
    protected function valueObjectClass(): string
    {
        return FatherName::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return FatherName::MAX_LENGTH;
    }
}
