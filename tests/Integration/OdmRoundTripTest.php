<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Integration;

use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AttributeDriver;
use MongoDB\Client;
use MongoDB\Driver\Exception\Exception as MongoException;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuSnilsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TypeRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Odm\Person;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
use MSSTC4PHP\ValueObject\Documents\Icao\PersonName as IcaoPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\FamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\GivenName;
use MSSTC4PHP\ValueObject\Documents\Name\RU\Patronymic;
use MSSTC4PHP\ValueObject\Documents\Name\RU\PersonName;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RuSnilsType::class)]
#[CoversClass(RuPersonNameType::class)]
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
        $this->client = new Client($uri !== false && $uri !== '' ? $uri : 'mongodb://127.0.0.1:27017', ['serverSelectionTimeoutMS' => 1000]);

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

        $raw = $this->client->selectCollection(self::DATABASE, 'person')->findOne([], ['typeMap' => ['root' => 'array', 'document' => 'array']]);

        self::assertIsArray($raw);
        self::assertSame('11223344595', $raw['snils']);
        self::assertSame(['family' => 'Иванов', 'given' => 'Иван', 'patronymic' => null, 'latin' => null], $raw['name']);
    }
}
