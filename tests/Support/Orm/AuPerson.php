<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Orm;

use Doctrine\ORM\Mapping as ORM;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuNswDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\NswDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Name\AU\PersonName;

#[ORM\Entity]
#[ORM\Table(name: 'au_person')]
class AuPerson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    public function __construct(
        #[ORM\Column(type: AuNswDriverLicenceNumberType::NAME)]
        public NswDriverLicenceNumber $licence,
        #[ORM\Column(type: AuPersonNameType::NAME)]
        public PersonName $name,
    ) {
    }
}
