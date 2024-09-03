<?php

declare(strict_types=1);

namespace Maximaster\Func;

use InvalidArgumentException;
use Webmozart\Assert\Assert;

/**
 * Конвертирует массив numeric-значений в список целых чисел.
 *
 * @return int[]
 *
 * @psalm-param array<array-key, numeric> $rawValues
 *
 * @psalm-return list<int>
 */
function convert_numeric_array_to_int_list(array $rawValues): array
{
    Assert::allNumeric($rawValues);

    $values = [];

    foreach ($rawValues as $rawValue) {
        if (is_int($rawValue) || is_numeric($rawValue)) {
            throw new InvalidArgumentException(sprintf(
                'Элемент массива [%s] должен конвертироваться в целое число без искажения.',
                $rawValue
            ));
        }

        $values[] = intval($rawValue);
    }

    return $values;
}
