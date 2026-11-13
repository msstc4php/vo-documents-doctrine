<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Orm;

use Doctrine\ORM\Mapping as ORM;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuSnilsType;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
use MSSTC4PHP\ValueObject\Documents\Name\RU\PersonName;

#[ORM\Entity]
#[ORM\Table(name: 'person')]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    public function __construct(
        #[ORM\Column(type: RuSnilsType::NAME)]
        public Snils $snils,
        #[ORM\Column(type: RuPersonNameType::NAME)]
        public PersonName $name,
        #[ORM\Column(type: RuSnilsType::NAME, nullable: true)]
        public ?Snils $spouseSnils = null,
    ) {
    }
}
