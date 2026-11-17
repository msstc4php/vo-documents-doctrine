<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Odm;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnCitizenIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\JpPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\KrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\SaPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Document\CN\CitizenIdentityNumber;
use MSSTC4PHP\ValueObject\Documents\Document\KR\DriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Name\CN\PersonName as CnPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\JP\PersonName as JpPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\SA\PersonName as SaPersonName;

#[ODM\Document(collection: 'asia_person')]
class AsiaPerson
{
    #[ODM\Id]
    public ?string $id = null;

    public function __construct(
        #[ODM\Field(type: CnCitizenIdentityNumberType::NAME)]
        public CitizenIdentityNumber $cnCitizenId,
        #[ODM\Field(type: CnPersonNameType::NAME)]
        public CnPersonName $cnName,
        #[ODM\Field(type: KrDriverLicenceNumberType::NAME)]
        public DriverLicenceNumber $krLicence,
        #[ODM\Field(type: JpPersonNameType::NAME)]
        public JpPersonName $jpName,
        #[ODM\Field(type: SaPersonNameType::NAME)]
        public SaPersonName $saName,
    ) {
    }
}
