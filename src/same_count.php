<?php

declare(strict_types=1);

namespace Maximaster\Func;

/**
 * Returns true if given arrays have same count.
 *
 * @psalm-param array<mixed> $first
 * @psalm-param array<mixed> $second
 * @psalm-param array<mixed> ...$others
 */
function same_count(array $first, array $second, array ...$others): bool
{
    $arrays = [$first, $second, ...array_values($others)];
    $counts = array_map('count', $arrays);
    $uniqCounts = array_unique($counts);

    return count($uniqCounts) === 1;
}
