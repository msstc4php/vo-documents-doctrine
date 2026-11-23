<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\ID\NationalIdentityNumber;
use Override;

final class IdNationalIdentityNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_id_national_identity_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NationalIdentityNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return NationalIdentityNumber::MAX_LENGTH;
    }
}
