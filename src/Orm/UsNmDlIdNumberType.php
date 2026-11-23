<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\NmDlIdNumber;
use Override;

final class UsNmDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_nm_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NmDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return NmDlIdNumber::MAX_LENGTH;
    }
}
