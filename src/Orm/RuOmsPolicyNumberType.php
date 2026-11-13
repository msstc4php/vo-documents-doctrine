<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\RU\OmsPolicyNumber;
use Override;

final class RuOmsPolicyNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_ru_oms_policy_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return OmsPolicyNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 16;
    }
}
