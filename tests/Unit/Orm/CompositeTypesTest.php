<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Unit\Orm;

use Doctrine\DBAL\Platforms\SQLitePlatform;
use Doctrine\DBAL\Types\Type;
use InvalidArgumentException;
use MSSTC4PHP\ValueObject\Contract\ValueObject;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ChPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\DePersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\EsPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\FrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\GbPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\ItPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\NlPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TypeRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Samples;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
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
#[CoversClass(TypeRegistrar::class)]
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
            self::assertStringContainsString('name', \strtolower($exception->getMessage()));
        }
    }

    /**
     * @param array<string, string|null> $payload
     */
    #[DataProviderExternal(Samples::class, 'composites')]
    public function testRefusesAMissingRequiredKey(string $name, ValueObject $vo, array $payload): void
    {
        unset($payload[\array_key_first($payload)]);
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToPHPValue(\json_encode($payload), $this->platform);
    }

    #[DataProviderExternal(Samples::class, 'compositeNames')]
    public function testRefusesANonStringColumnValue(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToPHPValue(['family' => 'X'], $this->platform);
    }
}
