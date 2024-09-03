<?php

declare(strict_types=1);

namespace Maximaster\Func;

/**
 * Returns true if these arrays have different values.
 *
 * @psalm-param array<mixed> $first
 * @psalm-param array<mixed> $second
 */
function different_values(array $first, array $second): bool
{
    return same_values($first, $second) === false;
}
