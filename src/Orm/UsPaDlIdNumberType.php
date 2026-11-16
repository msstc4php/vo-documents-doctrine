<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\PaDlIdNumber;
use Override;

final class UsPaDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_pa_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return PaDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 8;
    }
}
