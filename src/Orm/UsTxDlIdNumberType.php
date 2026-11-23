<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\US\DlId\TxDlIdNumber;
use Override;

final class UsTxDlIdNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_us_tx_dl_id_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return TxDlIdNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return TxDlIdNumber::MAX_LENGTH;
    }
}
