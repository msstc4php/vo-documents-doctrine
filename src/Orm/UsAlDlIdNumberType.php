<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\AlDlIdNumber;
use Override;

final class UsAlDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_al_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return AlDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return AlDlIdNumber::MAX_LENGTH;
    }
}
