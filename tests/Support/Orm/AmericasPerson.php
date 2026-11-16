<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Orm;

use Doctrine\ORM\Mapping as ORM;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaOnHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsSocialSecurityNumberType;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\OnHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\US\SocialSecurityNumber;
use MSSTC4PHP\ValueObject\Documents\Name\US\PersonName;

#[ORM\Entity]
#[ORM\Table(name: 'americas_person')]
class AmericasPerson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    public function __construct(
        #[ORM\Column(type: UsSocialSecurityNumberType::NAME)]
        public SocialSecurityNumber $ssn,
        #[ORM\Column(type: UsPersonNameType::NAME)]
        public PersonName $name,
        #[ORM\Column(type: CaOnHealthCardNumberType::NAME)]
        public OnHealthCardNumber $healthCard,
    ) {
    }
}
