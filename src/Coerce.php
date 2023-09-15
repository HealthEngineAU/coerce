<?php

declare(strict_types=1);

namespace Healthengine\Coerce;

class Coerce
{
    /**
     * @param mixed $value
     * @return bool
     * @throws CouldNotCoerceException
     */
    public static function toBool(mixed $value): bool
    {
        $result = settype($value, 'bool');

        if (!$result) {
            throw new CouldNotCoerceException('Could not coerce ' . gettype($value) . ' to bool');
        }

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

        $result = settype($value, 'bool');

        if (!$result) {
            throw new CouldNotCoerceException('Could not coerce ' . gettype($value) . ' to bool');
        }

        assert(is_bool($value));

        return $value;
    }

    /**
     * @param mixed $value
     * @return int
     * @throws CouldNotCoerceException
     */
    public static function toInt(mixed $value): int
    {
        if (is_object($value)) {
            throw new CouldNotCoerceException('Could not coerce ' . gettype($value) . ' to int');
        }

        $result = settype($value, 'int');

        if (!$result) {
            throw new CouldNotCoerceException('Could not coerce ' . gettype($value) . ' to int');
        }

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

        if (is_object($value)) {
            throw new CouldNotCoerceException('Could not coerce ' . gettype($value) . ' to int');
        }

        $result = settype($value, 'int');

        if (!$result) {
            throw new CouldNotCoerceException('Could not coerce ' . gettype($value) . ' to int');
        }

        assert(is_int($value));

        return $value;
    }

    /**
     * @param mixed $value
     * @return string
     * @throws CouldNotCoerceException
     */
    public static function toString(mixed $value): string
    {
        if (is_array($value)) {
            throw new CouldNotCoerceException('Could not coerce ' . gettype($value) . ' to string');
        }

        $result = settype($value, 'string');

        if (!$result) {
            throw new CouldNotCoerceException('Could not coerce ' . gettype($value) . ' to string');
        }

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

        if (is_array($value)) {
            throw new CouldNotCoerceException('Could not coerce ' . gettype($value) . ' to string');
        }

        $result = settype($value, 'string');

        if (!$result) {
            throw new CouldNotCoerceException('Could not coerce ' . gettype($value) . ' to string');
        }

        assert(is_string($value));

        return $value;
    }
}
