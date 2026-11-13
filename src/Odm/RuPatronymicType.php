<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Odm;

use MSSTC4PHP\ValueObject\Doctrine\Odm\AbstractStringVoType;
use MSSTC4PHP\ValueObject\Documents\Name\RU\Patronymic;
use Override;

final class RuPatronymicType extends AbstractStringVoType
{
    public const string NAME = 'vod_ru_patronymic';

    #[Override]
    protected function valueObjectClass(): string
    {
        return Patronymic::class;
    }
}
