<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\MsDlIdNumber;
use Override;

final class UsMsDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_ms_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return MsDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return MsDlIdNumber::MAX_LENGTH;
    }
}
