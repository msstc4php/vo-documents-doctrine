<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CH\IdentityDocumentNumber;
use Override;

final class ChIdentityDocumentNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ch_identity_document_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return IdentityDocumentNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 8;
    }
}
