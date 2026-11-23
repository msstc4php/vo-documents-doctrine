<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Integration;

use Composer\InstalledVersions;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AttributeDriver;
use Doctrine\ORM\Tools\SchemaTool;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuNswDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaOnHealthCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaOnHealthCardVersionCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnCitizenIdentityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\KrDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuSnilsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\SaPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TypeRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsSocialSecurityNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Orm\AmericasPerson;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Orm\AsiaPerson;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Orm\AuPerson;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Orm\Person;
use MSSTC4PHP\ValueObject\Documents\Document\AU\DriverLicence\NswDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\OnHealthCardNumber;
use MSSTC4PHP\ValueObject\Documents\Document\CA\HealthCard\OnHealthCardVersionCode;
use MSSTC4PHP\ValueObject\Documents\Document\CN\CitizenIdentityNumber;
use MSSTC4PHP\ValueObject\Documents\Document\KR\DriverLicenceNumber as KrDriverLicenceNumber;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
use MSSTC4PHP\ValueObject\Documents\Document\US\SocialSecurityNumber;
use MSSTC4PHP\ValueObject\Documents\Icao\PersonName as IcaoPersonName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\FamilyName as AuFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\GivenName as AuGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\AU\PersonName as AuPersonName;
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
use MSSTC4PHP\ValueObject\Documents\Name\US\FamilyName as UsFamilyName;
use MSSTC4PHP\ValueObject\Documents\Name\US\GivenName as UsGivenName;
use MSSTC4PHP\ValueObject\Documents\Name\US\PersonName as UsPersonName;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RuSnilsType::class)]
#[CoversClass(RuPersonNameType::class)]
#[CoversClass(AuNswDriverLicenceNumberType::class)]
#[CoversClass(AuPersonNameType::class)]
#[CoversClass(UsSocialSecurityNumberType::class)]
#[CoversClass(UsPersonNameType::class)]
#[CoversClass(CaOnHealthCardNumberType::class)]
#[CoversClass(CaOnHealthCardVersionCodeType::class)]
#[CoversClass(CnCitizenIdentityNumberType::class)]
#[CoversClass(CnPersonNameType::class)]
#[CoversClass(KrDriverLicenceNumberType::class)]
#[CoversClass(JpPersonNameType::class)]
#[CoversClass(SaPersonNameType::class)]
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
        // ORM 3.3 (the lowest supported) has no native lazy objects and falls back to its own proxies.
        if (\version_compare(InstalledVersions::getVersion('doctrine/orm') ?? '0', '3.4.0', '>=')) {
            $config->enableNativeLazyObjects(true);
        }

        $this->entityManager = new EntityManager($this->connection, $config);
        new SchemaTool($this->entityManager)->createSchema(
            [
                $this->entityManager->getClassMetadata(Person::class),
                $this->entityManager->getClassMetadata(AuPerson::class),
                $this->entityManager->getClassMetadata(AmericasPerson::class),
                $this->entityManager->getClassMetadata(AsiaPerson::class),
            ],
        );
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
            ['family' => 'Иванов', 'given' => 'Иван', 'patronymic' => null, 'latinOverride' => null],
            \json_decode($row['name'], true, 512, \JSON_THROW_ON_ERROR),
        );
    }

    /**
     * The one-off migration of the 1.0.0 CHANGELOG: rows written by 0.x keep their text until rewritten, so an equality
     * lookup (which binds the 1.0 text) misses them; re-encoding each stored value through its type fixes that.
     */
    public function testMigrationRecipeRewritesA0xRowWithThe1Point0Keys(): void
    {
        $this->connection->insert('person', [
            'snils' => '11223344595',
            'name' => '{"family":"Иванов","given":"Иван","patronymic":null,"latin":null}',
        ]);
        $name = new PersonName(FamilyName::from('Иванов'), GivenName::from('Иван'));

        self::assertNull($this->findPersonByName($name));

        $type = Type::getType(RuPersonNameType::NAME);
        $platform = $this->connection->getDatabasePlatform();
        foreach ($this->connection->iterateAssociative('SELECT id, name FROM person') as $row) {
            $migrated = $type->convertToDatabaseValue($type->convertToPHPValue($row['name'], $platform), $platform);
            if ($migrated !== $row['name']) {
                $this->connection->update('person', ['name' => $migrated], ['id' => $row['id']]);
            }
        }

        $row = $this->connection->fetchOne('SELECT name FROM person');
        self::assertIsString($row);
        self::assertSame(
            ['family' => 'Иванов', 'given' => 'Иван', 'patronymic' => null, 'latinOverride' => null],
            \json_decode($row, true, 512, \JSON_THROW_ON_ERROR),
        );
        self::assertInstanceOf(Person::class, $this->findPersonByName($name));
    }

    public function testAustralianLicenceAndPersonNameSurviveAFlushAndReload(): void
    {
        $name = new AuPersonName(
            AuFamilyName::from('Müller'),
            AuGivenName::from('Zoë'),
            IcaoPersonName::from('MULLER<<ZOE'),
        );
        $this->entityManager->persist(new AuPerson(NswDriverLicenceNumber::from('ab123456'), $name));
        $this->entityManager->flush();
        $this->entityManager->clear();

        $person = $this->entityManager->getRepository(AuPerson::class)->findOneBy([]);

        self::assertInstanceOf(AuPerson::class, $person);
        self::assertSame('AB123456', (string) $person->licence);
        self::assertTrue($name->equals($person->name));
        self::assertSame('MULLER<<ZOE', $person->name->latinOverride()?->value);
        self::assertSame(['AB123456'], $this->connection->fetchFirstColumn('SELECT licence FROM au_person'));
    }

    public function testAmericanDocumentsAndNameSurviveAFlushAndReload(): void
    {
        $name = new UsPersonName(UsFamilyName::from('Smith'), null);
        $this->entityManager->persist(
            new AmericasPerson(
                SocialSecurityNumber::from('123-45-6789'),
                $name,
                OnHealthCardNumber::from('9876543217'),
            ),
        );
        $this->entityManager->flush();
        $this->entityManager->clear();

        $person = $this->entityManager->getRepository(AmericasPerson::class)->findOneBy([]);

        self::assertInstanceOf(AmericasPerson::class, $person);
        self::assertSame('123456789', (string) $person->ssn);
        self::assertTrue($name->equals($person->name));
        self::assertNull($person->name->given);
    }

    public function testOntarioCardSurvivesAsTheNumberAndTheVersionCode(): void
    {
        $card = OnHealthCardNumber::fromCard('9876543217 YM');
        $this->entityManager->persist(
            new AmericasPerson(
                SocialSecurityNumber::from('123456789'),
                new UsPersonName(UsFamilyName::from('Smith'), UsGivenName::from('Jane')),
                $card->number(),
                $card->versionCode(),
            ),
        );
        $this->entityManager->flush();
        $this->entityManager->clear();

        $person = $this->entityManager->getRepository(AmericasPerson::class)->findOneBy([]);

        self::assertInstanceOf(AmericasPerson::class, $person);
        self::assertSame(
            [['healthCard' => '9876543217', 'healthCardVersionCode' => 'YM']],
            $this->connection->fetchAllAssociative('SELECT healthCard, healthCardVersionCode FROM americas_person'),
        );
        self::assertTrue($person->healthCard->equals($card->number()));
        self::assertTrue($person->healthCardVersionCode?->equals(OnHealthCardVersionCode::from('YM')));
    }

    public function testAsianDocumentsAndNamesSurviveAFlushAndReload(): void
    {
        $asia = $this->asiaPerson();
        $this->entityManager->persist($asia);
        $this->entityManager->flush();
        $this->entityManager->clear();

        $person = $this->entityManager->getRepository(AsiaPerson::class)->findOneBy([]);

        self::assertInstanceOf(AsiaPerson::class, $person);
        self::assertTrue($asia->cnCitizenId->equals($person->cnCitizenId));
        self::assertTrue($asia->cnName->equals($person->cnName));
        self::assertTrue($asia->krLicence->equals($person->krLicence));
        self::assertSame('11', $person->krLicence->regionCode());
        self::assertTrue($asia->jpName->equals($person->jpName));
        self::assertSame('YAMADA<<TAROH', $person->jpName->latin()->value);
        self::assertTrue($asia->saName->equals($person->saName));
    }

    public function testAsianRowHoldsTheHangulLicenceAndTheNationalScriptPayloads(): void
    {
        $this->entityManager->persist($this->asiaPerson());
        $this->entityManager->flush();

        $row = $this->connection->fetchAssociative(
            'SELECT cnCitizenId, cnName, krLicence, jpName, saName FROM asia_person',
        );

        self::assertIsArray($row);
        self::assertSame('110105199003071239', $row['cnCitizenId']);
        self::assertSame('서울 95-255933-61', $row['krLicence']);
        self::assertIsString($row['cnName']);
        self::assertIsString($row['jpName']);
        self::assertIsString($row['saName']);
        self::assertSame(
            ['family' => '张', 'given' => '伟', 'latin' => 'ZHANG<<WEI'],
            \json_decode($row['cnName'], true, 512, \JSON_THROW_ON_ERROR),
        );
        self::assertSame(
            [
                'family' => '山田',
                'given' => '太郎',
                'familyReading' => 'ヤマダ',
                'givenReading' => 'タロウ',
                'latinOverride' => 'YAMADA<<TAROH',
            ],
            \json_decode($row['jpName'], true, 512, \JSON_THROW_ON_ERROR),
        );
        self::assertSame(
            [
                'given' => 'محمد',
                'father' => null,
                'grandfather' => null,
                'family' => 'آل سعود',
                'latin' => 'AL<SAUD<<MOHAMMED',
            ],
            \json_decode($row['saName'], true, 512, \JSON_THROW_ON_ERROR),
        );
    }

    private function findPersonByName(PersonName $name): ?Person
    {
        $this->entityManager->clear();
        $found = $this->entityManager->createQuery(
            \sprintf('SELECT p FROM %s p WHERE p.name = :name', Person::class),
        )->setParameter('name', $name, RuPersonNameType::NAME)->getOneOrNullResult();

        return $found instanceof Person ? $found : null;
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
