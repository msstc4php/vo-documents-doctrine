<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\NeDlIdNumber;
use Override;

final class UsNeDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_ne_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return NeDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return NeDlIdNumber::MAX_LENGTH;
    }
}
