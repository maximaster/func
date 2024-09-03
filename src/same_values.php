<?php

declare(strict_types=1);

namespace Maximaster\Func;

/**
 * Returns true if these arrays have the same values.
 *
 * @psalm-param array<mixed> $first
 * @psalm-param array<mixed> $second
 */
function same_values(array $first, array $second): bool
{
    // TODO Improve comparison for objects.
    return same_count($first, $second) === true
        && array_diff($first, $second) === [];
}
