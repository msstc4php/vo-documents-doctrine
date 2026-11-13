<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Unit\Odm;

use Doctrine\ODM\MongoDB\Types\Type;
use InvalidArgumentException;
use MSSTC4PHP\ValueObject\Contract\ValueObject;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TypeRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Support\Samples;
use MSSTC4PHP\ValueObject\Documents\Document\RU\Snils;
use MSSTC4PHP\ValueObject\Exception\InvalidValueObjectException;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(AuPersonNameType::class)]
#[CoversClass(RuPersonNameType::class)]
#[CoversClass(TypeRegistrar::class)]
final class CompositeTypesTest extends TestCase
{
    #[Override]
    protected function setUp(): void
    {
        TypeRegistrar::register();
    }

    /**
     * @param array<string, string|null> $payload
     */
    #[DataProviderExternal(Samples::class, 'composites')]
    public function testStoresTheCodecPayloadAsSubDocument(string $name, ValueObject $vo, array $payload): void
    {
        self::assertSame($payload, Type::getType($name)->convertToDatabaseValue($vo));
    }

    /**
     * @param array<string, string|null> $payload
     */
    #[DataProviderExternal(Samples::class, 'composites')]
    public function testRoundTrips(string $name, ValueObject $vo, array $payload): void
    {
        $type = Type::getType($name);

        $restored = $type->convertToPHPValue($type->convertToDatabaseValue($vo));

        self::assertInstanceOf($vo::class, $restored);
        self::assertTrue($vo->equals($restored));
        self::assertSame(\json_encode($vo), \json_encode($restored));
    }

    #[DataProviderExternal(Samples::class, 'compositeNames')]
    public function testNullRoundTrips(string $name): void
    {
        $type = Type::getType($name);

        self::assertNull($type->convertToDatabaseValue(null));
        self::assertNull($type->convertToPHPValue(null));
    }

    #[DataProviderExternal(Samples::class, 'compositeNames')]
    public function testRefusesAnotherValueObjectOnWrite(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToDatabaseValue(Snils::from('11223344595'));
    }

    #[DataProviderExternal(Samples::class, 'compositeNames')]
    public function testRefusesAWrongShape(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToPHPValue(['family' => 'X']);
    }

    /**
     * @param array<string, string|null> $payload
     */
    #[DataProviderExternal(Samples::class, 'composites')]
    public function testRefusesAnInvalidNameWithoutEchoingIt(string $name, ValueObject $vo, array $payload): void
    {
        $stored = ['family' => '123'] + $payload;

        try {
            Type::getType($name)->convertToPHPValue($stored);
            self::fail('An invalid stored name was accepted.');
        } catch (InvalidValueObjectException $exception) {
            self::assertStringNotContainsString('123', $exception->getMessage());
        }
    }

    #[DataProviderExternal(Samples::class, 'compositeNames')]
    public function testRefusesANonArrayStoredValue(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToPHPValue('{"family":"X"}');
    }
}
