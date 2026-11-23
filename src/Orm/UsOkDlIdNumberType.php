<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\OkDlIdNumber;
use Override;

final class UsOkDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_ok_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return OkDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return OkDlIdNumber::MAX_LENGTH;
    }
}
