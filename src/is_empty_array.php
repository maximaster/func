<?php

declare(strict_types=1);

namespace Maximaster\Func;

/**
 * Checks if the array is empty.
 *
 * @psalm-param array<mixed> $values
 *
 * @psalm-assert-if-false non-empty-array<mixed> $values
 *
 * @phpstan-assert-if-false non-empty-array<mixed> $values
 */
function is_empty_array(array $values): bool
{
    return count($values) <= 0;
}
