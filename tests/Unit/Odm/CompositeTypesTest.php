<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Unit\Odm;

use Doctrine\ODM\MongoDB\Types\Type;
use InvalidArgumentException;
use MSSTC4PHP\ValueObject\Contract\ValueObject;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ChPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\DePersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\EsPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\FrPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\GbPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\ItPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\NlPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TrPersonNameType;
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
    #[Override]
    protected function setUp(): void
    {
        TypeRegistrar::registerAll();
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

        Type::getType($name)->convertToPHPValue(['surname' => 'X']);
    }

    /**
     * @param array<string, string|null> $payload
     */
    #[DataProviderExternal(Samples::class, 'composites')]
    public function testRefusesAnInvalidNameWithoutEchoingIt(string $name, ValueObject $vo, array $payload): void
    {
        $stored = [\array_key_first($payload) => 'ZZQQ9'] + $payload;

        try {
            Type::getType($name)->convertToPHPValue($stored);
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

        Type::getType($name)->convertToPHPValue($payload);
    }

    #[DataProviderExternal(Samples::class, 'compositeNames')]
    public function testRefusesANonArrayStoredValue(string $name): void
    {
        $this->expectException(InvalidArgumentException::class);

        Type::getType($name)->convertToPHPValue('{"family":"X"}');
    }
}
