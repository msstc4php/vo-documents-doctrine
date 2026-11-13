<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\FR\TaxIdentificationNumber;
use Override;

final class FrTaxIdentificationNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_fr_tax_identification_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return TaxIdentificationNumber::class;
    }
}
