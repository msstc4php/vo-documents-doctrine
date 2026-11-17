<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\SA\NationalIdentityNumber;
use Override;

final class SaNationalIdentityNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_sa_national_identity_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NationalIdentityNumber::class;
    }
}
