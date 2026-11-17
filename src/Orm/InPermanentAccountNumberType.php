<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\IN\PermanentAccountNumber;
use Override;

final class InPermanentAccountNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_in_permanent_account_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return PermanentAccountNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 10;
    }
}
