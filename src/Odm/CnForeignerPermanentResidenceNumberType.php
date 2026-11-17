<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CN\ForeignerPermanentResidenceNumber;
use Override;

final class CnForeignerPermanentResidenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_cn_foreigner_permanent_residence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return ForeignerPermanentResidenceNumber::class;
    }
}
