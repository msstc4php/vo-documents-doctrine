<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\IdDlIdNumber;
use Override;

final class UsIdDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_id_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return IdDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 9;
    }
}
