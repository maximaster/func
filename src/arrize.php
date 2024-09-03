<?php

declare(strict_types=1);

namespace Maximaster\Func;

use Traversable;

/**
 * Make an array from any value if it itsn't aready.
 *
 * @template InputType
 *
 * @psalm-param InputType $value
 * TODO it's impossible to preserve original array type due the bug:
 *      https://github.com/vimeo/psalm/issues/5459
 *
 * @psalm-return ($value is null ? array{} : ($value is array ? array<array-key, mixed> : array{InputType}))
 */
function arrize($value): array
{
    /** @psalm-var mixed $value */
    if ($value === null) {
        return [];
    }

    if (is_array($value)) {
        /** @psalm-suppress LessSpecificReturnStatement why:false-positive */
        return $value;
    }

    if ($value instanceof Traversable) {
        /** @psalm-suppress LessSpecificReturnStatement why:false-positive */
        return iterator_to_array($value);
    }

    return [$value];
}
