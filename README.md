# Coerce

## About

Coerce `mixed` value into a desired scalar type or die trying.

## Install

```shell
composer require healthengine/coerce
```

## Usage

```php
<?php

declare(strict_types=1);

use Healthengine\Coerce\Coerce;
use Healthengine\Coerce\CouldNotCoerceException;
use stdClass;

Coerce::toBool(1); // true

Coerce::toBoolOrNull(null) // null

Coerce::toInt('1'); // 1

Coerce::toInt(new stdClass()); // CouldNotCoerceException

Coerce::toIntOrNull(null) // null

Coerce::toIntOrNull(new stdClass()); // CouldNotCoerceException

Coerce::toNonEmptyString('123'); // '123'

Coerce::toNonEmptyString(''); // CouldNotCoerceException

Coerce::toString(1); // '1'

Coerce::toString([]) // CouldNotCoerceException

Coerce::toStringOrNull(null); // null

Coerce::toStringOrNull([]) // CouldNotCoerceException
```
