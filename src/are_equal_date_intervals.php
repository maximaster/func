<?php

declare(strict_types=1);

namespace Maximaster\Func;

use DateInterval as PhpDateInterval;

/**
 * Returns true if the date intervals are equal.
 */
function are_equal_date_intervals(PhpDateInterval $firstDateInterval, PhpDateInterval $secondDateInterval): bool
{
    return $firstDateInterval->y === $secondDateInterval->y
        && $firstDateInterval->m === $secondDateInterval->m
        && $firstDateInterval->d === $secondDateInterval->d
        && $firstDateInterval->h === $secondDateInterval->h
        && $firstDateInterval->i === $secondDateInterval->i
        && $firstDateInterval->s === $secondDateInterval->s
        // Note: There is a problem in php when detecting floating point numbers.
        && (string) $firstDateInterval->f === (string) $secondDateInterval->f;
}
