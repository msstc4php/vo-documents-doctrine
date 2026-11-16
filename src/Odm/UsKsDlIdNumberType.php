<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\KsDlIdNumber;
use Override;

final class UsKsDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_ks_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return KsDlIdNumber::class;
    }
}
