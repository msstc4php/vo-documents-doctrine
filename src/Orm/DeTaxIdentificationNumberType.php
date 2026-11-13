<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\DE\TaxIdentificationNumber;
use Override;

final class DeTaxIdentificationNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_de_tax_identification_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return TaxIdentificationNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 11;
    }
}
