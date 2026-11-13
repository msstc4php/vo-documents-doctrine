<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\NL\IdentityDocumentNumber;
use Override;

final class NlIdentityDocumentNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_nl_identity_document_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return IdentityDocumentNumber::class;
    }
}
