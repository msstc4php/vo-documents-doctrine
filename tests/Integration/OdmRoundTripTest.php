<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Integration;

use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AttributeDriver;
use MongoDB\Client;
use MongoDB\Driver\Exception\Exception as MongoException;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnCitizenIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\CnPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\JpPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\KrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuSnilsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\SaPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TypeRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Odm\AsiaPerson;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Odm\Person;
use MSSTC4PHP\ValueObject\Documents\Document\CN\CitizenIdentityNumber;
use MSSTC4PHP\ValueObject\Documents\Document\KR\DriverLicenceNumber as KrDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
use MSSTC4PHP\ValueObject\Documents\Icao\PersonName as IcaoPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\CN\FamilyName as CnFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\CN\GivenName as CnGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\CN\PersonName as CnPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\JP\FamilyName as JpFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\JP\FamilyNameReading as JpFamilyNameReading;
use MSSTC4PHP\ValueObject\Documents\Name\JP\GivenName as JpGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\JP\GivenNameReading as JpGivenNameReading;
use MSSTC4PHP\ValueObject\Documents\Name\JP\PersonName as JpPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\FamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\GivenName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\Patronymic;
use MSSTC4PHP\ValueObject\Documents\Name\RU\PersonName;
use MSSTC4PHP\ValueObject\Documents\Name\SA\FamilyName as SaFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\SA\GivenName as SaGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\SA\PersonName as SaPersonName;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RuSnilsType::class)]
#[CoversClass(RuPersonNameType::class)]
#[CoversClass(CnCitizenIdentityNumberType::class)]
#[CoversClass(CnPersonNameType::class)]
#[CoversClass(KrDriverLicenceNumberType::class)]
#[CoversClass(JpPersonNameType::class)]
#[CoversClass(SaPersonNameType::class)]
#[UsesClass(TypeRegistrar::class)]
final class OdmRoundTripTest extends TestCase
{
    private const string DATABASE = 'vo_documents_doctrine_test';

    private DocumentManager $documentManager;

    private Client $client;

    private bool $connected = false;

    #[Override]
    protected function setUp(): void
    {
        $uri = \getenv('MONGODB_URI');
        $server = $uri !== false && $uri !== '' ? $uri : 'mongodb://127.0.0.1:27017';
        $this->client = new Client($server, ['serverSelectionTimeoutMS' => 1000]);

        try {
            $this->client->selectDatabase('admin')->command(['ping' => 1]);
        } catch (MongoException) {
            self::markTestSkipped('MongoDB is not reachable; set MONGODB_URI to run the ODM integration test.');
        }

        $this->connected = true;
        TypeRegistrar::registerAll();
        $this->client->dropDatabase(self::DATABASE);

        $config = new Configuration();
        $config->setDefaultDB(self::DATABASE);
        $config->setMetadataDriverImpl(new AttributeDriver([__DIR__ . '/../Support/Odm']));
        $config->setProxyDir(\sys_get_temp_dir() . '/vod-proxies');
        $config->setProxyNamespace('VodProxies');
        $config->setHydratorDir(\sys_get_temp_dir() . '/vod-hydrators');
        $config->setHydratorNamespace('VodHydrators');
        $config->setAutoGenerateProxyClasses(Configuration::AUTOGENERATE_EVAL);
        $config->setAutoGenerateHydratorClasses(Configuration::AUTOGENERATE_EVAL);

        $this->documentManager = DocumentManager::create($this->client, $config);
    }

    #[Override]
    protected function tearDown(): void
    {
        if ($this->connected) {
            $this->client->dropDatabase(self::DATABASE);
        }
    }

    public function testSnilsAndPersonNameSurviveAFlushAndReload(): void
    {
        $name = new PersonName(
            FamilyName::from('Иванов'),
            GivenName::from('Иван'),
            Patronymic::from('Иванович'),
            IcaoPersonName::from('IVANOV<<IVAN<IVANOVICH'),
        );
        $this->documentManager->persist(new Person(Snils::from('112-233-445 95'), $name));
        $this->documentManager->flush();
        $this->documentManager->clear();

        $person = $this->documentManager->getRepository(Person::class)->findOneBy([]);

        self::assertInstanceOf(Person::class, $person);
        self::assertSame('11223344595', (string) $person->snils);
        self::assertTrue($name->equals($person->name));
        self::assertSame('IVANOV<<IVAN<IVANOVICH', $person->name->latinOverride()?->value);
        self::assertNull($person->spouseSnils);
    }

    public function testStoredDocumentHoldsTheCanonicalFormAndASubDocument(): void
    {
        $name = new PersonName(FamilyName::from('Иванов'), GivenName::from('Иван'));
        $this->documentManager->persist(new Person(Snils::from('112-233-445 95'), $name));
        $this->documentManager->flush();

        $raw = $this->client->selectCollection(
            self::DATABASE,
            'person',
        )->findOne([], ['typeMap' => ['root' => 'array', 'document' => 'array']]);

        self::assertIsArray($raw);
        self::assertSame('11223344595', $raw['snils']);
        self::assertSame(
            ['family' => 'Иванов', 'given' => 'Иван', 'patronymic' => null, 'latin' => null],
            $raw['name'],
        );
    }

    public function testAsianDocumentsAndNamesSurviveAFlushAndReload(): void
    {
        $asia = $this->asiaPerson();
        $this->documentManager->persist($asia);
        $this->documentManager->flush();
        $this->documentManager->clear();

        $person = $this->documentManager->getRepository(AsiaPerson::class)->findOneBy([]);

        self::assertInstanceOf(AsiaPerson::class, $person);
        self::assertTrue($asia->cnCitizenId->equals($person->cnCitizenId));
        self::assertTrue($asia->cnName->equals($person->cnName));
        self::assertTrue($asia->krLicence->equals($person->krLicence));
        self::assertSame('11', $person->krLicence->regionCode());
        self::assertTrue($asia->jpName->equals($person->jpName));
        self::assertSame('YAMADA<<TAROH', $person->jpName->latin()->value);
        self::assertTrue($asia->saName->equals($person->saName));
    }

    public function testAsianDocumentHoldsTheHangulLicenceAndTheNationalScriptSubDocuments(): void
    {
        $this->documentManager->persist($this->asiaPerson());
        $this->documentManager->flush();

        $raw = $this->client->selectCollection(
            self::DATABASE,
            'asia_person',
        )->findOne([], ['typeMap' => ['root' => 'array', 'document' => 'array']]);

        self::assertIsArray($raw);
        self::assertSame('110105199003071239', $raw['cnCitizenId']);
        self::assertSame('서울 95-255933-61', $raw['krLicence']);
        self::assertSame(['family' => '张', 'given' => '伟', 'latin' => 'ZHANG<<WEI'], $raw['cnName']);
        self::assertSame(
            [
                'family' => '山田',
                'given' => '太郎',
                'familyReading' => 'ヤマダ',
                'givenReading' => 'タロウ',
                'latin' => 'YAMADA<<TAROH',
            ],
            $raw['jpName'],
        );
        self::assertSame(
            [
                'given' => 'محمد',
                'father' => null,
                'grandfather' => null,
                'family' => 'آل سعود',
                'latin' => 'AL<SAUD<<MOHAMMED',
            ],
            $raw['saName'],
        );
    }

    private function asiaPerson(): AsiaPerson
    {
        return new AsiaPerson(
            CitizenIdentityNumber::from('110105 19900307 1239'),
            new CnPersonName(CnFamilyName::from('张'), CnGivenName::from('伟'), IcaoPersonName::from('ZHANG<<WEI')),
            KrDriverLicenceNumber::from('서울9525593361'),
            new JpPersonName(
                JpFamilyName::from('山田'),
                JpGivenName::from('太郎'),
                JpFamilyNameReading::from('ヤマダ'),
                JpGivenNameReading::from('タロウ'),
                IcaoPersonName::from('YAMADA<<TAROH'),
            ),
            new SaPersonName(
                SaGivenName::from('محمد'),
                null,
                null,
                SaFamilyName::from('آل سعود'),
                IcaoPersonName::from('AL<SAUD<<MOHAMMED'),
            ),
        );
    }
}
