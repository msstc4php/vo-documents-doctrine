<?php

declare(strict_types=1);

namespace MSSTC4PHP\ValueObject\Documents\Doctrine\Tests\Unit\Contract;

use Doctrine\DBAL\Types\Type as OrmType;
use Doctrine\ODM\MongoDB\Types\Type as OdmType;
use FilesystemIterator;
use MSSTC4PHP\ValueObject\Contract\StringConvertible;
use MSSTC4PHP\ValueObject\Contract\ValueObject;
use MSSTC4PHP\ValueObject\Documents\Codecs;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuActDriverLicenceNumberType as OdmAuActDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuFamilyNameType as OdmAuFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuGivenNameType as OdmAuGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuMedicareCardNumberType as OdmAuMedicareCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuNswDriverLicenceNumberType as OdmAuNswDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuNtDriverLicenceNumberType as OdmAuNtDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuPersonNameType as OdmAuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuQldDriverLicenceNumberType as OdmAuQldDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuSaDriverLicenceNumberType as OdmAuSaDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuTasDriverLicenceNumberType as OdmAuTasDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuTaxFileNumberType as OdmAuTaxFileNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuVicDriverLicenceNumberType as OdmAuVicDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\AuWaDriverLicenceNumberType as OdmAuWaDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\IcaoPersonNameType as OdmIcaoPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuDriverLicenceNumberType as OdmRuDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuFamilyNameType as OdmRuFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuGivenNameType as OdmRuGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuInnType as OdmRuInnType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuInternalPassportNumberType as OdmRuInternalPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuInternationalPassportNumberType as OdmRuInternationalPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuOmsPolicyNumberType as OdmRuOmsPolicyNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPassportIssuingUnitCodeType as OdmRuPassportIssuingUnitCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPatronymicType as OdmRuPatronymicType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuPersonNameType as OdmRuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\RuSnilsType as OdmRuSnilsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Odm\TypeRegistrar as OdmRegistrar;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuActDriverLicenceNumberType as OrmAuActDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuFamilyNameType as OrmAuFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuGivenNameType as OrmAuGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuMedicareCardNumberType as OrmAuMedicareCardNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuNswDriverLicenceNumberType as OrmAuNswDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuNtDriverLicenceNumberType as OrmAuNtDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuPersonNameType as OrmAuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuQldDriverLicenceNumberType as OrmAuQldDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuSaDriverLicenceNumberType as OrmAuSaDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuTasDriverLicenceNumberType as OrmAuTasDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuTaxFileNumberType as OrmAuTaxFileNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuVicDriverLicenceNumberType as OrmAuVicDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\AuWaDriverLicenceNumberType as OrmAuWaDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\IcaoPersonNameType as OrmIcaoPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuDriverLicenceNumberType as OrmRuDriverLicenceNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuFamilyNameType as OrmRuFamilyNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuGivenNameType as OrmRuGivenNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuInnType as OrmRuInnType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuInternalPassportNumberType as OrmRuInternalPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuInternationalPassportNumberType as OrmRuInternationalPassportNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuOmsPolicyNumberType as OrmRuOmsPolicyNumberType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPassportIssuingUnitCodeType as OrmRuPassportIssuingUnitCodeType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPatronymicType as OrmRuPatronymicType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuPersonNameType as OrmRuPersonNameType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\RuSnilsType as OrmRuSnilsType;
use MSSTC4PHP\ValueObject\Documents\Doctrine\Orm\TypeRegistrar as OrmRegistrar;
use MSSTC4PHP\ValueObject\Documents\Sex;
use MSSTC4PHP\ValueObject\Payload\PayloadCodec;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use ReflectionMethod;
use SplFileInfo;

#[CoversClass(OrmRegistrar::class)]
#[CoversClass(OdmRegistrar::class)]
#[UsesClass(OrmAuActDriverLicenceNumberType::class)]
#[UsesClass(OrmAuFamilyNameType::class)]
#[UsesClass(OrmAuGivenNameType::class)]
#[UsesClass(OrmAuMedicareCardNumberType::class)]
#[UsesClass(OrmAuNswDriverLicenceNumberType::class)]
#[UsesClass(OrmAuNtDriverLicenceNumberType::class)]
#[UsesClass(OrmAuPersonNameType::class)]
#[UsesClass(OrmAuQldDriverLicenceNumberType::class)]
#[UsesClass(OrmAuSaDriverLicenceNumberType::class)]
#[UsesClass(OrmAuTasDriverLicenceNumberType::class)]
#[UsesClass(OrmAuTaxFileNumberType::class)]
#[UsesClass(OrmAuVicDriverLicenceNumberType::class)]
#[UsesClass(OrmAuWaDriverLicenceNumberType::class)]
#[UsesClass(OrmIcaoPersonNameType::class)]
#[UsesClass(OrmRuDriverLicenceNumberType::class)]
#[UsesClass(OrmRuFamilyNameType::class)]
#[UsesClass(OrmRuGivenNameType::class)]
#[UsesClass(OrmRuInnType::class)]
#[UsesClass(OrmRuInternalPassportNumberType::class)]
#[UsesClass(OrmRuInternationalPassportNumberType::class)]
#[UsesClass(OrmRuOmsPolicyNumberType::class)]
#[UsesClass(OrmRuPassportIssuingUnitCodeType::class)]
#[UsesClass(OrmRuPatronymicType::class)]
#[UsesClass(OrmRuPersonNameType::class)]
#[UsesClass(OrmRuSnilsType::class)]
#[UsesClass(OdmAuActDriverLicenceNumberType::class)]
#[UsesClass(OdmAuFamilyNameType::class)]
#[UsesClass(OdmAuGivenNameType::class)]
#[UsesClass(OdmAuMedicareCardNumberType::class)]
#[UsesClass(OdmAuNswDriverLicenceNumberType::class)]
#[UsesClass(OdmAuNtDriverLicenceNumberType::class)]
#[UsesClass(OdmAuPersonNameType::class)]
#[UsesClass(OdmAuQldDriverLicenceNumberType::class)]
#[UsesClass(OdmAuSaDriverLicenceNumberType::class)]
#[UsesClass(OdmAuTasDriverLicenceNumberType::class)]
#[UsesClass(OdmAuTaxFileNumberType::class)]
#[UsesClass(OdmAuVicDriverLicenceNumberType::class)]
#[UsesClass(OdmAuWaDriverLicenceNumberType::class)]
#[UsesClass(OdmIcaoPersonNameType::class)]
#[UsesClass(OdmRuDriverLicenceNumberType::class)]
#[UsesClass(OdmRuFamilyNameType::class)]
#[UsesClass(OdmRuGivenNameType::class)]
#[UsesClass(OdmRuInnType::class)]
#[UsesClass(OdmRuInternalPassportNumberType::class)]
#[UsesClass(OdmRuInternationalPassportNumberType::class)]
#[UsesClass(OdmRuOmsPolicyNumberType::class)]
#[UsesClass(OdmRuPassportIssuingUnitCodeType::class)]
#[UsesClass(OdmRuPatronymicType::class)]
#[UsesClass(OdmRuPersonNameType::class)]
#[UsesClass(OdmRuSnilsType::class)]
final class EveryDocumentClassHasATypeTest extends TestCase
{
    /**
     * @return iterable<string, array{'orm'|'odm'}>
     */
    public static function branches(): iterable
    {
        yield 'orm' => ['orm'];
        yield 'odm' => ['odm'];
    }

    /**
     * @param 'orm'|'odm' $branch
     */
    #[DataProvider('branches')]
    public function testEveryValueObjectHasExactlyOneType(string $branch): void
    {
        $mapped = [];
        foreach ($this->typeValueObjectClasses($branch) as $name => $class) {
            $mapped[$class][] = $name;
        }

        foreach ($this->valueObjectClasses() as $class) {
            self::assertCount(1, $mapped[$class] ?? [], \sprintf('%s needs exactly one %s type.', $class, $branch));
        }
    }

    /**
     * @param 'orm'|'odm' $branch
     */
    #[DataProvider('branches')]
    public function testNoTypeMapsAClassOutsideThePackage(string $branch): void
    {
        $expected = $this->valueObjectClasses();

        foreach ($this->typeValueObjectClasses($branch) as $name => $class) {
            self::assertContains($class, $expected, \sprintf('Type "%s" maps %s, which is not a document value object.', $name, $class));
        }
    }

    public function testBothBranchesRegisterTheSameNames(): void
    {
        self::assertSame(\array_keys(OrmRegistrar::types()), \array_keys(OdmRegistrar::types()));
    }

    /**
     * @return list<class-string> the non-abstract, non-internal value objects with a string form or a codec
     */
    private function valueObjectClasses(): array
    {
        $composites = [];
        foreach (Codecs::all() as $codec) {
            $composites[] = $codec->valueObjectClass();
        }

        $classes = [];
        foreach ($this->sourceClasses() as $reflection) {
            if (!$reflection->implementsInterface(ValueObject::class)) {
                continue;
            }

            $class = $reflection->getName();
            if (!$reflection->implementsInterface(StringConvertible::class)) {
                self::assertContains($class, $composites, \sprintf('Composite %s has no codec in Codecs::all().', $class));
            }

            $classes[] = $class;
        }

        \sort($classes);

        return $classes;
    }

    /**
     * @return iterable<int, ReflectionClass<object>>
     */
    private function sourceClasses(): iterable
    {
        $sexFile = new ReflectionClass(Sex::class)->getFileName();
        self::assertIsString($sexFile);
        $source = \dirname($sexFile);
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source, FilesystemIterator::SKIP_DOTS));

        foreach ($files as $file) {
            self::assertInstanceOf(SplFileInfo::class, $file);
            $path = $file->getPathname();
            if (!\str_ends_with($path, '.php')) {
                continue;
            }

            $class = 'MSSTC4PHP\\ValueObject\\Documents\\' . \str_replace('/', '\\', \substr($path, \strlen($source) + 1, -4));
            if (\str_starts_with($class, 'MSSTC4PHP\\ValueObject\\Documents\\Internal\\') || !\class_exists($class)) {
                continue;
            }

            $reflection = new ReflectionClass($class);
            if ($reflection->isAbstract()) {
                continue;
            }

            yield $reflection;
        }
    }

    /**
     * @param 'orm'|'odm' $branch
     *
     * @return array<string, class-string>
     */
    private function typeValueObjectClasses(string $branch): array
    {
        $classes = [];
        if ($branch === 'orm') {
            OrmRegistrar::register();
            foreach (OrmRegistrar::types() as $name => $_) {
                $classes[$name] = $this->mappedClass(OrmType::getType($name));
            }

            return $classes;
        }

        OdmRegistrar::register();
        foreach (OdmRegistrar::types() as $name => $_) {
            $classes[$name] = $this->mappedClass(OdmType::getType($name));
        }

        return $classes;
    }

    /**
     * @return class-string
     */
    private function mappedClass(object $type): string
    {
        if (\method_exists($type, 'valueObjectClass')) {
            $class = new ReflectionMethod($type, 'valueObjectClass')->invoke($type);
        } else {
            $codec = new ReflectionMethod($type, 'codec')->invoke($type);
            self::assertInstanceOf(PayloadCodec::class, $codec);
            $class = $codec->valueObjectClass();
        }

        self::assertIsString($class);
        self::assertTrue(\class_exists($class));

        return $class;
    }
}
