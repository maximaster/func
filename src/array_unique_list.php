<?php

declare(strict_types=1);

namespace Maximaster\Func;

/**
 * Returns a list of unique values.
 *
 * @template T = mixed
 *
 * @psalm-param array<T> $values
 *
 * @psalm-return list<T>
 */
function array_unique_list(array $values): array
{
    return array_values(array_unique($values, SORT_REGULAR));
}
