<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Unit\Odm;

use Doctrine\ODM\MongoDB\Types\Type;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TypeRegistrar;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TypeRegistrar::class)]
final class TypeRegistrarTest extends TestCase
{
    public function testRegistersEveryTypeAndIsIdempotent(): void
    {
        TypeRegistrar::registerAll();
        TypeRegistrar::registerAll();

        foreach (TypeRegistrar::types() as $name => $class) {
            self::assertTrue(Type::hasType($name), \sprintf('Type "%s" was not registered.', $name));
            self::assertInstanceOf($class, Type::getType($name));
        }
    }

    public function testNamesFollowThePrefixConvention(): void
    {
        foreach (TypeRegistrar::types() as $name => $class) {
            self::assertMatchesRegularExpression('/^vod_(?:ru|au|de|fr|it|es|nl|ch|gb|tr|us|ca|mx|br|icao)_[a-z]+(?:_[a-z]+)*$/', $name);
            self::assertSame($name, $class::NAME);
        }
    }
}
