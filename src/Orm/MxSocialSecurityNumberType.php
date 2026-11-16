<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\MX\SocialSecurityNumber;
use Override;

final class MxSocialSecurityNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_mx_social_security_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return SocialSecurityNumber::class;
    }

    #[Override]
    protected function columnLength(): int
    {
        return 11;
    }
}
