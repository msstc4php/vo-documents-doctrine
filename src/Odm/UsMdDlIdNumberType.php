<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\MdDlIdNumber;
use Override;

final class UsMdDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_md_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return MdDlIdNumber::class;
    }
}
