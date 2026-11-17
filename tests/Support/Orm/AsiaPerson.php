<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Orm;

use Doctrine\ORM\Mapping as ORM;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnCitizenIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\KrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\SaPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Document\CN\CitizenIdentityNumber;
use MSSTC4PHP\ValueObject\Documents\Document\KR\DriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Name\CN\PersonName as CnPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\JP\PersonName as JpPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\SA\PersonName as SaPersonName;

#[ORM\Entity]
#[ORM\Table(name: 'asia_person')]
class AsiaPerson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    public function __construct(
        #[ORM\Column(type: CnCitizenIdentityNumberType::NAME)]
        public CitizenIdentityNumber $cnCitizenId,
        #[ORM\Column(type: CnPersonNameType::NAME)]
        public CnPersonName $cnName,
        #[ORM\Column(type: KrDriverLicenceNumberType::NAME)]
        public DriverLicenceNumber $krLicence,
        #[ORM\Column(type: JpPersonNameType::NAME)]
        public JpPersonName $jpName,
        #[ORM\Column(type: SaPersonNameType::NAME)]
        public SaPersonName $saName,
    ) {
    }
}
