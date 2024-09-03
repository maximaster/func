<?php

declare(strict_types=1);

namespace Maximaster\Func;

use Webmozart\Assert\Assert;

/**
 * Checks if the passed value is of the specified type.
 *
 * @psalm-param non-empty-string $type
 * @psalm-param mixed $value
 */
function has_type(string $type, $value): bool
{
    Assert::stringNotEmpty($type);

    return get_debug_type($value) === $type
        || $value instanceof $type;
}
