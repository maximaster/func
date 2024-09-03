<?php

declare(strict_types=1);

namespace Maximaster\Func;

/**
 * @psalm-param array<mixed> $items
 *
 * @psalm-suppress MixedInferredReturnType why:false-positive
 *
 * @psalm-return list<scalar|object|resource|null>
 */
function array_flatten(array $items): array
{
    /** @psalm-suppress MixedReturnStatement,InvalidArgument why:false-positive */
    return array_reduce(
        $items,
        /**
         * @psalm-param list<scalar|object|resource|null> $carry
         * @psalm-param mixed $item
         */
        fn (array $carry, $item): array => is_array($item)
            ? [...$carry, ...array_flatten($item)]
            : [...$carry, $item],
        []
    );
}
