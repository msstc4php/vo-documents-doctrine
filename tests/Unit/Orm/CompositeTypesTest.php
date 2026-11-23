<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Unit\Orm;

use Doctrine\DBAL\Platforms\SQLitePlatform;
use Doctrine\DBAL\Types\Type;
use InvalidArgumentException;
use MSSTC4PHP\ValueObject\Contract\ValueObject;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\BrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CaPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\CnPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DePersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\IdPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\InDevanagariPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\InPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\JpPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\KrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\MxPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\NlPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\SaPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TypeRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\UsPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Samples;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
use MSSTC4PHP\ValueObject\Documents\Exception\InvalidPersonNameException;
use MSSTC4PHP\ValueObject\Exception\InvalidValueObjectException;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(AuPersonNameType::class)]
#[CoversClass(RuPersonNameType::class)]
#[CoversClass(DePersonNameType::class)]
#[CoversClass(FrPersonNameType::class)]
#[CoversClass(ItPersonNameType::class)]
#[CoversClass(EsPersonNameType::class)]
#[CoversClass(NlPersonNameType::class)]
#[CoversClass(ChPersonNameType::class)]
#[CoversClass(GbPersonNameType::class)]
#[CoversClass(TrPersonNameType::class)]
#[CoversClass(BrPersonNameType::class)]
#[CoversClass(CaPersonNameType::class)]
#[CoversClass(MxPersonNameType::class)]
#[CoversClass(UsPersonNameType::class)]
#[CoversClass(TypeRegistrar::class)]
#[CoversClass(CnPersonNameType::class)]
#[CoversClass(IdPersonNameType::class)]
#[CoversClass(InPersonNameType::class)]
#[CoversClass(InDevanagariPersonNameType::class)]
#[CoversClass(JpPersonNameType::class)]
#[CoversClass(KrPersonNameType::class)]
#[CoversClass(SaPersonNameType::class)]
final class CompositeTypesTest extends TestCase
{
    private SQLitePlatform $platform;

    #[Override]
    protected function setUp(): void
    {
        TypeRegistrar::registerAll();
        $this->platform = new SQLitePlatform();
    }

    /**
     * @param array<string, string|null> $payload
     */
    #[DataProviderExternal(Samples::class, 'composites')]
    public function testStoresTheCodecPayloadAsJson(string $name, ValueObject $vo, array $payload): void
    {
        $stored = Type::getType($name)->convertToDatabaseValue($vo, $this->platform);

        self::assertIsString($stored);
        self::assertSame($payload, \json_decode($stored, true, 512, \JSON_THROW_ON_ERROR));
    }

    /**
     * @param array<string, string|null> $payload
     */
    #[DataProviderExternal(Samples::class, 'composites')]
    public function testRoundTrips(string $name, ValueObject $vo, array $payload): void
    {
        $type = Type::getType($name);

        $restored = $type->convertToPHPValue($type->convertToDatabaseValue($vo, $this->platform), $this->platform);

        self::assertInstanceOf($vo::class, $restored);
        self::assertTrue($vo->equals($restored));
        self::assertSame(\json_encode($vo), \json_encode($restored));
    }

    #[DataProviderExternal(Samples::class, 'compositeNames')]
    public function testColumnIsText(string $name): void
    {
        self::assertSame('CLOB', Type::getType($name)->getSQLDeclaration([], $this->platform));
    }

    /**
     * @param array<string, string|null> $payload
     */
    #[DataProviderExternal(Samples::class, 'payloadsOf0x')]
    public function testReadsAPayloadStoredBy0x(string $name, array $payload, ValueObject $expected): void
    {
        $restored = Type::getType($name)->convertToPHPValue(\json_encode($payload, \JSON_THROW_ON_ERROR), $this->platform);

        self::assertInstanceOf($expected::class, $restored);
        self::assertTrue($expected->equals($restored));
    }

    /**
     * The CHANGELOG migration step (decode, encode) moves a 0.x payload to the 1.0 keys, leaves a 1.0 payload as it is
     * (so the loop updates nothing twice) and keeps NULL.
     *
     * @param array<string, string|null> $payload
     */
    #[DataProviderExternal(Samples::class, 'payloadsOf0x')]
    public function testMigrationStepRewritesA0xPayloadOnce(string $name, array $payload, ValueObject $expected): void
    {
        $type = Type::getType($name);
        $reencode = fn (?string $stored): mixed => $type->convertToDatabaseValue($type->convertToPHPValue($stored, $this->platform), $this->platform);

        $migrated = $reencode(\json_encode($payload, \JSON_THROW_ON_ERROR));

        self::assertSame($type->convertToDatabaseValue($expected, $this->platform), $migrated);
        self::assertIsString($migrated);
        self::assertSame($migrated, $reencode($migrated));
        self::assertNull($reencode(null));
    }

    #[DataProviderExternal(Samples::class, 'compositeNames')]
    public function testNullRoundTrips(string $name): void
    {
        $type = Type::getType($name);

        self::assertNull($type->convertToDatabaseValue(null, $this->platform));
        self::assertNull($type->convertToPHPValue(null, $this->platform));
    }

    #[DataProviderExternal(Samples::class, 'compositeNames')]
    public function testRefusesAnotherValueObjectOnWrite(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToDatabaseValue(Snils::from('11223344595'), $this->platform);
    }

    #[DataProviderExternal(Samples::class, 'compositeNames')]
    public function testRefusesAWrongShape(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToPHPValue('{"surname":"X"}', $this->platform);
    }

    #[DataProviderExternal(Samples::class, 'compositeNames')]
    public function testRefusesInvalidJson(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToPHPValue('{', $this->platform);
    }

    /**
     * @param array<string, string|null> $payload
     */
    #[DataProviderExternal(Samples::class, 'composites')]
    public function testRefusesAnInvalidNameWithoutEchoingIt(string $name, ValueObject $vo, array $payload): void
    {
        $stored = \json_encode([\array_key_first($payload) => 'ZZQQ9'] + $payload);
        self::assertIsString($stored);

        try {
            Type::getType($name)->convertToPHPValue($stored, $this->platform);
            self::fail('An invalid stored name was accepted.');
        } catch (InvalidValueObjectException $exception) {
            self::assertStringNotContainsString('ZZQQ9', $exception->getMessage());
            self::assertInstanceOf(InvalidPersonNameException::class, $exception);
        }
    }

    /**
     * @param array<string, string|null> $payload
     * @param non-empty-string $key
     */
    #[DataProviderExternal(Samples::class, 'compositeRequiredKeys')]
    public function testRefusesAMissingRequiredKey(string $name, array $payload, string $key): void
    {
        unset($payload[$key]);
        $stored = \json_encode($payload);
        self::assertIsString($stored);
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToPHPValue($stored, $this->platform);
    }

    #[DataProviderExternal(Samples::class, 'compositeNames')]
    public function testRefusesANonStringColumnValue(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToPHPValue(['family' => 'X'], $this->platform);
    }
}
