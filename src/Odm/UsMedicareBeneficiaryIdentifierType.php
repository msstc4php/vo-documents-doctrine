<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\MedicareBeneficiaryIdentifier;
use Override;

final class UsMedicareBeneficiaryIdentifierType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_medicare_beneficiary_identifier';

    #[Override]
    protected function valueObjectClass(): string
    {
        return MedicareBeneficiaryIdentifier::class;
    }
}
