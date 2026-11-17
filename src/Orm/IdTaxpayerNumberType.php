<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\ID\TaxpayerNumber;
use Override;

final class IdTaxpayerNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_id_taxpayer_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return TaxpayerNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 16;
    }
}
