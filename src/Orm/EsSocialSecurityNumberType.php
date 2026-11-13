<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\ES\SocialSecurityNumber;
use Override;

final class EsSocialSecurityNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_es_social_security_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return SocialSecurityNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 12;
    }
}
