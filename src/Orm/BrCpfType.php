<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\BR\Cpf;
use Override;

final class BrCpfType extends AbstractStringVoType
{
    public const string NAME = 'vod_br_cpf';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Cpf::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 11;
    }
}
