<?php

declare(strict_types=1);

namespace Maximaster\Func;

use Webmozart\Assert\Assert;

/**
 * Apply manually ordered keys to sort input array.
 *
 * @psalm-param array<array-key, mixed> $input
 * @psalm-param list<array-key> $orderedKeys
 */
function mksort(array &$input, array $orderedKeys): void
{
    Assert::uniqueValues($orderedKeys, 'All ordered keys should be uniq.');
    Assert::count($orderedKeys, count($input), 'Count on ordered keys and input should match.');
    // phpcs:ignore Generic.Files.LineLength.TooLong
    Assert::count(array_diff($orderedKeys, array_keys($input)), 0, 'Ordered keys should not contain unknown input keys.');

    $resorted = [];
    foreach ($orderedKeys as $orderedKey) {
        /** @psalm-suppress MixedAssignment why:intended */
        $resorted[$orderedKey] = $input[$orderedKey];
    }

    $input = $resorted;

    // uksort doesn't preserve integer keys.
    //    uksort(
    //        $input,
    //        static fn (string $leftId, string $rightId) => (
    //            array_search($leftId, $orderedKeys, true) <=> array_search($rightId, $orderedKeys, true)
    //        )
    //    );
}
