<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CN\CitizenIdentityNumber;
use Override;

final class CnCitizenIdentityNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_cn_citizen_identity_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return CitizenIdentityNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 18;
    }
}
