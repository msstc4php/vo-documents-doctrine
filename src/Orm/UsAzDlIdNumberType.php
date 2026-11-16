<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\AzDlIdNumber;
use Override;

final class UsAzDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_az_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return AzDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
