<?php

declare(strict_types=1);

namespace Maximaster\Func;

use ReflectionException;

/**
 * Filters the array recursively using the callback function.
 *
 * @psalm-param array<int|string, mixed> $array
 * @psalm-param callable(mixed, array-key):bool $filter
 *
 * @psalm-return array<int|string, mixed>
 *
 * @throws ReflectionException
 */
function array_filter_recursive(array $array, callable $filter): array
{
    $filter = $filter instanceof ArrayRecursiveFilter ? $filter : new ArrayRecursiveFilter($filter);

    /** @psalm-var mixed $value */
    foreach ($array as $key => $value) {

        if ($filter($value, $key) === false) {
            unset($array[$key]);

            continue;
        }

        if (is_array($value)) {
            $array[$key] = array_filter_recursive($value, $filter);
        }
    }

    return $array;
}
