<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\AU\TaxFileNumber;
use Override;

final class AuTaxFileNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_au_tax_file_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return TaxFileNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return TaxFileNumber::MAX_LENGTH;
    }
}
