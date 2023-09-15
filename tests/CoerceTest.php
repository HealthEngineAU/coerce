<?php

declare(strict_types=1);

namespace Tests;

use Healthengine\Coerce\Coerce;
use Healthengine\Coerce\CouldNotCoerceException;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @covers \Healthengine\Coerce\Coerce
 */
class CoerceTest extends TestCase
{
    public static function toBoolSucceedsProvider(): array
    {
        return [
            ['', false],
            ['abc', true],
            [0, false],
            [1, true],
            [['abc'], true],
            [[0], true],
            [[], false],
            [false, false],
            [null, false],
            [true, true],
        ];
    }

    /**
     * @dataProvider toBoolSucceedsProvider
     * @param mixed $value
     * @param bool $expected
     * @return void
     * @throws CouldNotCoerceException
     */
    public function testToBoolSucceeds(mixed $value, bool $expected): void
    {
        $this->assertSame($expected, Coerce::toBool($value));
    }

    public static function toBoolOrNullSucceedsProvider(): array
    {
        return [
            ['', false],
            ['abc', true],
            [0, false],
            [1, true],
            [['abc'], true],
            [[0], true],
            [[], false],
            [false, false],
            [null, null],
            [true, true],
        ];
    }

    public static function toIntFailsProvider(): array
    {
        return [
            [new stdClass()],
        ];
    }

    /**
     * @dataProvider toIntFailsProvider
     * @param mixed $value
     * @return void
     * @throws CouldNotCoerceException
     */
    public function testToIntFails(mixed $value): void
    {
        $this->expectException(CouldNotCoerceException::class);

        Coerce::toInt($value);
    }

    /**
     * @dataProvider toIntFailsProvider
     * @param mixed $value
     * @return void
     * @throws CouldNotCoerceException
     */
    public function testToIntOrNullFails(mixed $value): void
    {
        $this->expectException(CouldNotCoerceException::class);

        Coerce::toIntOrNull($value);
    }

    /**
     * @dataProvider toBoolOrNullSucceedsProvider
     * @param mixed $value
     * @param bool|null $expected
     * @return void
     * @throws CouldNotCoerceException
     */
    public function testToBoolOrNullSucceeds(mixed $value, bool|null $expected): void
    {
        $this->assertSame($expected, Coerce::toBoolOrNull($value));
    }

    public static function toIntSucceedsProvider(): array
    {
        return [
            ['', 0],
            ['abc', 0],
            [0, 0],
            [1, 1],
            [['abc'], 1],
            [[0], 1],
            [[], 0],
            [false, 0],
            [null, 0],
            [true, 1],
        ];
    }

    /**
     * @dataProvider toIntSucceedsProvider
     * @param mixed $value
     * @param int $expected
     * @return void
     * @throws CouldNotCoerceException
     */
    public function testToIntSucceeds(mixed $value, int $expected): void
    {
        $this->assertSame($expected, Coerce::toInt($value));
    }

    public static function toIntOrNullSucceedsProvider(): array
    {
        return [
            ['', 0],
            ['abc', 0],
            [0, 0],
            [1, 1],
            [['abc'], 1],
            [[0], 1],
            [[], 0],
            [false, 0],
            [null, null],
            [true, 1],
        ];
    }

    /**
     * @dataProvider toIntOrNullSucceedsProvider
     * @param mixed $value
     * @param int|null $expected
     * @return void
     * @throws CouldNotCoerceException
     */
    public function testToIntOrNullSucceeds(mixed $value, int|null $expected): void
    {
        $this->assertSame($expected, Coerce::toIntOrNull($value));
    }

    public static function toStringSucceedsProvider(): array
    {
        return [
            ['', ''],
            ['abc', 'abc'],
            [0, '0'],
            [1, '1'],
            [false, ''],
            [null, ''],
            [true, '1'],
        ];
    }

    /**
     * @dataProvider toStringSucceedsProvider
     * @param mixed $value
     * @param string $expected
     * @return void
     * @throws CouldNotCoerceException
     */
    public function testToStringSucceeds(mixed $value, string $expected): void
    {
        $this->assertSame($expected, Coerce::toString($value));
    }

    public static function toStringOrNullSucceedsProvider(): array
    {
        return [
            ['', ''],
            ['abc', 'abc'],
            [0, '0'],
            [1, '1'],
            [false, ''],
            [null, null],
            [true, '1'],
        ];
    }

    /**
     * @dataProvider toStringOrNullSucceedsProvider
     * @param mixed $value
     * @param null|string $expected
     * @return void
     * @throws CouldNotCoerceException
     */
    public function testToStringOrNullSucceeds(mixed $value, null|string $expected): void
    {
        $this->assertSame($expected, Coerce::toStringOrNull($value));
    }

    public static function toStringFailsProvider(): array
    {
        return [
            [[]],
        ];
    }

    /**
     * @dataProvider toStringFailsProvider
     * @param mixed $value
     * @return void
     */
    public function testToStringFails(mixed $value): void
    {
        $this->expectException(CouldNotCoerceException::class);

        Coerce::toString($value);
    }

    /**
     * @dataProvider toStringFailsProvider
     * @param mixed $value
     * @return void
     */
    public function testToStringOrNullFails(mixed $value): void
    {
        $this->expectException(CouldNotCoerceException::class);

        Coerce::toStringOrNull($value);
    }
}
