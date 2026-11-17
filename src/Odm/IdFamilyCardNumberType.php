<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Document\ID\FamilyCardNumber;
use Override;

final class IdFamilyCardNumberType extends AbstractStringVoType
{
    public const string NAME = 'vod_id_family_card_number';

    #[Override]
    protected function valueObjectClass(): string
    {
        return FamilyCardNumber::class;
    }
}
