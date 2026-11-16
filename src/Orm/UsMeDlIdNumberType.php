<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\MeDlIdNumber;
use Override;

final class UsMeDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_me_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return MeDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 7;
    }
}
