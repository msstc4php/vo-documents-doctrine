<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\IT\FiscalCode;
use Override;

final class ItFiscalCodeType extends AbstractStringVoType
{
    public const string NAME = 'vod_it_fiscal_code';

    #[Override]
    protected function valueObjectClass(): string
    {
        return FiscalCode::class;
    }
}
