<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\WaDlIdNumber;
use Override;

final class UsWaDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_wa_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return WaDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 12;
    }
}
