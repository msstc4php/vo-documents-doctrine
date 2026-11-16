<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractJsonVoType;
use MSSTC4PHP\ValueObject\Documents\Name\BR\PersonName;
use MSSTC4PHP\ValueObject\Documents\Name\BR\PersonNameCodec;
use MSSTC4PHP\ValueObject\Payload\PayloadCodec;
use Override;

/**
 * @extends AbstractJsonVoType<PersonName>
 */
final class BrPersonNameType extends AbstractJsonVoType
{
    public const string NAME = 'vod_br_person_name';

    /**
     * @return PayloadCodec<PersonName>
     */
    #[Override]
    protected function codec(): PayloadCodec
    {
        return new PersonNameCodec();
    }
}
