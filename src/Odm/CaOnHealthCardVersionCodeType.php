<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\OnHealthCardVersionCode;
use Override;

final class CaOnHealthCardVersionCodeType extends AbstractStringVoType
{
    public const string NAME = 'vod_ca_on_health_card_version_code';

    #[Override]
    protected function valueObjectClass(): string
    {
        return OnHealthCardVersionCode::class;
    }
}
