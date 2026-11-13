<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\FR\LegacyIdentityCardNumber;
use Override;

final class FrLegacyIdentityCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_fr_legacy_identity_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return LegacyIdentityCardNumber::class;
    }
}
