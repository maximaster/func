<?php

declare(strict_types=1);

namespace Maximaster\Func;

/**
 * Returns true if all array elements are unique values.
 */
function has_only_unique_values(array $values): bool
{
    return count($values) === count(array_unique($values));
}
