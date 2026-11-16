<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\HiDlIdNumber;
use Override;

final class UsHiDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_hi_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return HiDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
