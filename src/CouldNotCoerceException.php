<?php

declare(strict_types=1);

namespace Healthengine\Coerce;

use Exception;

class CouldNotCoerceException extends Exception
{
    public static function valueToType(mixed $value, string $type): self
    {
        return new self('Could not coerce ' . gettype($value) . ' to ' . $type);
    }
}
