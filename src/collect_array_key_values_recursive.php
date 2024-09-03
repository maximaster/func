<?php

declare(strict_types=1);

namespace Maximaster\Func;

use InvalidArgumentException;

/**
 * @psalm-param array<array-key, mixed> $array
 * @psalm-param array-key $collectedKey
 *
 * @psalm-return list<mixed>
 */
function collect_key_values_recursive($array, $collectedKey): array
{
    /** @psalm-suppress RedundantConditionGivenDocblockType,DocblockTypeContradiction why:intended */
    if (is_string($collectedKey) === false && is_int($collectedKey) === false) {
        throw new InvalidArgumentException('The array key must be integer or string.');
    }

    $collectedValues = [];

    /** @psalm-suppress MixedAssignment why:intended */
    foreach ($array as $key => $value) {
        if ($key === $collectedKey) {
            /** @psalm-suppress MixedAssignment why:intended */
            $collectedValues[] = $value;

            continue;
        }

        if (is_array($value)) {
            $collectedValues = array_merge($collectedValues, collect_key_values_recursive($value, $collectedKey));
        }
    }

    return $collectedValues;
}
