<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\SA\IqamaNumber;
use Override;

final class SaIqamaNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_sa_iqama_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return IqamaNumber::class;
    }
}
