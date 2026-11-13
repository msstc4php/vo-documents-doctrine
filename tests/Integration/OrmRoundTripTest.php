<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Integration;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AttributeDriver;
use Doctrine\ORM\Tools\SchemaTool;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuNswDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuSnilsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TypeRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Orm\AuPerson;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Orm\Person;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\NswDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
use MSSTC4PHP\ValueObject\Documents\Icao\PersonName as IcaoPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\FamilyName as AuFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\GivenName as AuGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\PersonName as AuPersonName;
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
#[CoversClass(AuNswDriverLicenceNumberType::class)]
#[CoversClass(AuPersonNameType::class)]
#[UsesClass(TypeRegistrar::class)]
final class OrmRoundTripTest extends TestCase
{
    private Connection $connection;

    private EntityManager $entityManager;

    #[Override]
    protected function setUp(): void
    {
        TypeRegistrar::registerAll();

        $this->connection = DriverManager::getConnection(['driver' => 'pdo_sqlite', 'memory' => true]);
        $config = new Configuration();
        $config->setMetadataDriverImpl(new AttributeDriver([__DIR__ . '/../Support/Orm']));
        $config->setProxyDir(\sys_get_temp_dir() . '/vod-proxies');
        $config->setProxyNamespace('VodProxies');
        $config->enableNativeLazyObjects(true);

        $this->entityManager = new EntityManager($this->connection, $config);
        new SchemaTool($this->entityManager)->createSchema([$this->entityManager->getClassMetadata(Person::class), $this->entityManager->getClassMetadata(AuPerson::class)]);
    }

    public function testSnilsAndPersonNameSurviveAFlushAndReload(): void
    {
        $name = new PersonName(FamilyName::from('Иванов'), GivenName::from('Иван'), Patronymic::from('Иванович'));
        $this->entityManager->persist(new Person(Snils::from('112-233-445 95'), $name));
        $this->entityManager->flush();
        $this->entityManager->clear();

        $person = $this->entityManager->getRepository(Person::class)->findOneBy([]);

        self::assertInstanceOf(Person::class, $person);
        self::assertSame('11223344595', (string) $person->snils);
        self::assertTrue($name->equals($person->name));
        self::assertNull($person->spouseSnils);
    }

    public function testLatinOverrideSurvivesAFlushAndReload(): void
    {
        $name = new PersonName(
            FamilyName::from('Иванов'),
            GivenName::from('Иван'),
            Patronymic::from('Иванович'),
            IcaoPersonName::from('IVANOV<<IVAN<IVANOVICH'),
        );
        $this->entityManager->persist(new Person(Snils::from('11223344595'), $name));
        $this->entityManager->flush();
        $this->entityManager->clear();

        $person = $this->entityManager->getRepository(Person::class)->findOneBy([]);

        self::assertInstanceOf(Person::class, $person);
        self::assertSame('IVANOV<<IVAN<IVANOVICH', $person->name->latinOverride()?->value);
        self::assertSame('IVANOV<<IVAN<IVANOVICH', $person->name->latin()->value);
    }

    public function testStoredRowHoldsTheCanonicalFormAndOnlyTheOverride(): void
    {
        $name = new PersonName(FamilyName::from('Иванов'), GivenName::from('Иван'));
        $this->entityManager->persist(new Person(Snils::from('112-233-445 95'), $name, Snils::from('11223344595')));
        $this->entityManager->flush();

        $row = $this->connection->fetchAssociative('SELECT snils, name, spouseSnils FROM person');

        self::assertIsArray($row);
        self::assertSame('11223344595', $row['snils']);
        self::assertSame('11223344595', $row['spouseSnils']);
        self::assertIsString($row['name']);
        self::assertSame(
            ['family' => 'Иванов', 'given' => 'Иван', 'patronymic' => null, 'latin' => null],
            \json_decode($row['name'], true, 512, \JSON_THROW_ON_ERROR),
        );
    }

    public function testAustralianLicenceAndPersonNameSurviveAFlushAndReload(): void
    {
        $name = new AuPersonName(AuFamilyName::from('Smith'), AuGivenName::from('Jane'), IcaoPersonName::from('SMITH<<JANE'));
        $this->entityManager->persist(new AuPerson(NswDriverLicenceNumber::from('ab123456'), $name));
        $this->entityManager->flush();
        $this->entityManager->clear();

        $person = $this->entityManager->getRepository(AuPerson::class)->findOneBy([]);

        self::assertInstanceOf(AuPerson::class, $person);
        self::assertSame('AB123456', (string) $person->licence);
        self::assertTrue($name->equals($person->name));
        self::assertSame('SMITH<<JANE', $person->name->latinOverride()?->value);
        self::assertSame(['AB123456'], $this->connection->fetchFirstColumn('SELECT licence FROM au_person'));
    }
}
