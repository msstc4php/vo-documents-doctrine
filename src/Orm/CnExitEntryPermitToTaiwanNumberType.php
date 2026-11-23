<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CN\ExitEntryPermitToTaiwanNumber;
use Override;

final class CnExitEntryPermitToTaiwanNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_cn_exit_entry_permit_to_taiwan_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return ExitEntryPermitToTaiwanNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return ExitEntryPermitToTaiwanNumber::MAX_LENGTH;
    }
}
