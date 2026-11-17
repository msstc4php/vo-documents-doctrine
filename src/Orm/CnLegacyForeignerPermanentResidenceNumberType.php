<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CN\LegacyForeignerPermanentResidenceNumber;
use Override;

final class CnLegacyForeignerPermanentResidenceNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_cn_legacy_foreigner_permanent_residence_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return LegacyForeignerPermanentResidenceNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 15;
    }
}
