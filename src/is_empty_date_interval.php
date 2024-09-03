<?php

declare(strict_types=1);

namespace Maximaster\Func;

use DateInterval as PhpDateInterval;

/**
 * Returns true if the date interval is empty.
 */
function is_empty_date_interval(PhpDateInterval $dateInterval): bool
{
    return $dateInterval->y === 0
        && $dateInterval->m === 0
        && $dateInterval->d === 0
        && $dateInterval->h === 0
        && $dateInterval->i === 0
        && $dateInterval->s === 0
        // Note: There is a problem in php when detecting floating point numbers.
        && (string) $dateInterval->f === '0';
}
