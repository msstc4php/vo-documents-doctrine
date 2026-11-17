<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CN\ExitEntryPermitToHongKongMacauNumber;
use Override;

final class CnExitEntryPermitToHongKongMacauNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_cn_exit_entry_permit_to_hong_kong_macau_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return ExitEntryPermitToHongKongMacauNumber::class;
    }
}
