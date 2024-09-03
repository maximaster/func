<?php

declare(strict_types=1);

namespace Maximaster\Func;

use InvalidArgumentException;
use RuntimeException;

/**
 * Returns new string list where each of string being suffixed.
 *
 * @template KeyType of array-key
 *
 * @psalm-param non-empty-string $suffix
 * @psalm-param non-empty-array<KeyType, string> $list
 *
 * @psalm-return array<KeyType, non-empty-string>
 */
function suffix_strings(string $suffix, array $list): array
{
    /**
     * Do not trust input. Set to native types and check.
     *
     * @psalm-var string $suffix
     * @psalm-var array<mixed> $list
     */
    if ($suffix === '') {
        throw new InvalidArgumentException('Suffix should be non-empty-string.');
    }

    if (count($list) === 0) {
        throw new InvalidArgumentException('Suffixed array should be non-empty.');
    }

    foreach ($list as $itemPosition => $listItem) {
        /**
         * Distrust input, check manually.
         *
         * @var mixed $listItem
         */
        if (is_string($listItem) === false) {
            throw new InvalidArgumentException(
                sprintf(
                    'All of list items should be strings, got [%s] at $list[%s].',
                    get_debug_type($listItem),
                    $itemPosition
                )
            );
        }
    }

    /** @psalm-var array<KeyType, non-empty-string>|null $suffixed */
    /** @psalm-var non-empty-array<KeyType, string> $list */
    $suffixed = preg_replace('/$/', $suffix, $list);
    if ($suffixed === null) {
        throw new RuntimeException('Something went wrong while suffixing using preg_replace.');
    }

    /** @psalm-var array<KeyType, non-empty-string> $suffixed */
    return $suffixed;
}
