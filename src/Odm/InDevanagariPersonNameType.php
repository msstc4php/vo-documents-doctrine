<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractArrayVoType;
use MSSTC4PHP\ValueObject\Documents\Name\IN\Devanagari\PersonName;
use MSSTC4PHP\ValueObject\Documents\Name\IN\Devanagari\PersonNameCodec;
use MSSTC4PHP\ValueObject\Payload\PayloadCodec;
use Override;

/**
 * @extends AbstractArrayVoType<PersonName>
 */
final class InDevanagariPersonNameType extends AbstractArrayVoType
{
    public const string NAME = 'vod_in_devanagari_person_name';

    /**
     * @return PayloadCodec<PersonName>
     */
    #[Override]
    protected function codec(): PayloadCodec
    {
        return new PersonNameCodec();
    }
}
