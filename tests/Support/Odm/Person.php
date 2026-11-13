<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Odm;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuSnilsType;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
use MSSTC4PHP\ValueObject\Documents\Name\RU\PersonName;

#[ODM\Document(collection: 'person')]
class Person
{
    #[ODM\Id]
    public ?string $id = null;

    public function __construct(
        #[ODM\Field(type: RuSnilsType::NAME)]
        public Snils $snils,
        #[ODM\Field(type: RuPersonNameType::NAME)]
        public PersonName $name,
        #[ODM\Field(type: RuSnilsType::NAME, nullable: true)]
        public ?Snils $spouseSnils = null,
    ) {
    }
}
