<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\NL\Bsn;
use Override;

final class NlBsnType extends AbstractStringVoType
{
    public const string NAME = 'vod_nl_bsn';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Bsn::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return Bsn::MAX_LENGTH;
    }
}
