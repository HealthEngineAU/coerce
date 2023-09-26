<?php

declare(strict_types=1);

namespace Healthengine\Coerce;

class Coerce
{
    /**
     * @param mixed $value
     * @param string $type
     * @return void
     * @throws CouldNotCoerceException
     */
    private static function setType(mixed &$value, string $type): void
    {
        $result = settype($value, $type);

        if (!$result) {
            throw CouldNotCoerceException::valueToType($value, $type);
        }
    }

    /**
     * @param mixed $value
     * @return bool
     * @throws CouldNotCoerceException
     */
    public static function toBool(mixed $value): bool
    {
        self::setType($value, 'bool');

        assert(is_bool($value));

        return $value;
    }

    /**
     * @param mixed $value
     * @return bool|null
     * @throws CouldNotCoerceException
     */
    public static function toBoolOrNull(mixed $value): ?bool
    {
        if ($value === null) {
            return null;
        }

        return self::toBool($value);
    }

    /**
     * @param mixed $value
     * @return int
     * @throws CouldNotCoerceException
     */
    public static function toInt(mixed $value): int
    {
        if (is_object($value)) {
            throw CouldNotCoerceException::valueToType($value, 'int');
        }

        self::setType($value, 'int');

        assert(is_int($value));

        return $value;
    }

    /**
     * @param mixed $value
     * @return int|null
     * @throws CouldNotCoerceException
     */
    public static function toIntOrNull(mixed $value): ?int
    {
        if ($value === null) {
            return null;
        }

        return self::toInt($value);
    }

    /**
     * @param mixed $value
     * @phpstan-return non-empty-string
     * @return string
     * @throws CouldNotCoerceException
     */
    public static function toNonEmptyString(mixed $value): string
    {
        $coerced = self::toString($value);

        if (strlen($coerced) === 0) {
            throw CouldNotCoerceException::valueToType($value, 'non-empty-string');
        }

        return $coerced;
    }

    /**
     * @param mixed $value
     * @return string
     * @throws CouldNotCoerceException
     */
    public static function toString(mixed $value): string
    {
        if (is_array($value) || is_object($value)) {
            throw CouldNotCoerceException::valueToType($value, 'string');
        }

        self::setType($value, 'string');

        assert(is_string($value));

        return $value;
    }

    /**
     * @param mixed $value
     * @return string|null
     * @throws CouldNotCoerceException
     */
    public static function toStringOrNull(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return self::toString($value);
    }
}
