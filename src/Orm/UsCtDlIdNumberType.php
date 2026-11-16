<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\CtDlIdNumber;
use Override;

final class UsCtDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_ct_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return CtDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
