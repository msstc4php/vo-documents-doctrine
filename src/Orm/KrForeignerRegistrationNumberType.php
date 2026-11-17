<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\KR\ForeignerRegistrationNumber;
use Override;

final class KrForeignerRegistrationNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_kr_foreigner_registration_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return ForeignerRegistrationNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 13;
    }
}
