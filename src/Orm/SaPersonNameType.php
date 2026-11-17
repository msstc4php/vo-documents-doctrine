<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Orm;

use MSSTC4PHP\ValueObject\Doctrine\Orm\AbstractJsonVoType;
use MSSTC4PHP\ValueObject\Documents\Name\SA\PersonName;
use MSSTC4PHP\ValueObject\Documents\Name\SA\PersonNameCodec;
use MSSTC4PHP\ValueObject\Payload\PayloadCodec;
use Override;

/**
 * @extends AbstractJsonVoType<PersonName>
 */
final class SaPersonNameType extends AbstractJsonVoType
{
    public const string NAME = 'vod_sa_person_name';

    /**
     * @return PayloadCodec<PersonName>
     */
    #[Override]
    protected function codec(): PayloadCodec
    {
        return new PersonNameCodec();
    }
}
