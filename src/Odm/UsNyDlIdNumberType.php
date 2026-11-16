<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\NyDlIdNumber;
use Override;

final class UsNyDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_ny_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NyDlIdNumber::class;
    }
}
