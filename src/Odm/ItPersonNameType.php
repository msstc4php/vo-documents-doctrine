<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractArrayVoType;
use MSSTC4PHP\ValueObject\Documents\Name\IT\PersonName;
use MSSTC4PHP\ValueObject\Documents\Name\IT\PersonNameCodec;
use MSSTC4PHP\ValueObject\Payload\PayloadCodec;
use Override;

/**
 * @extends AbstractArrayVoType<PersonName>
 */
final class ItPersonNameType extends AbstractArrayVoType
{
    public const string NAME = 'vod_it_person_name';

    /**
     * @return PayloadCodec<PersonName>
     */
    #[Override]
    protected function codec(): PayloadCodec
    {
        return new PersonNameCodec();
    }
}
