<?php

declare(strict_types=1);

use function Maximaster\Func\same_count;

describe('same_count', function (): void {
    it('should be true for same array given twice', function (): void {
        $input = [1];

        $result = same_count($input, $input);

        expect($result)->toBeTruthy();
    });

    it('should be false for arrays with different count', function (): void {
        $first = [1];
        $second = array_merge($first, [2]);
        $result = same_count($first, $second);

        expect($result)->toBeFalsy();
    });

    it('should be true for different structured arrays, but with same count', function (): void {
        $first = [1, 2];
        $second = [2 => 1, 1 => 0];
        $third = ['one' => 1, 'two' => 2];

        $result = same_count($first, $second, $third);

        expect($result)->toBeTruthy();
    });

    it('should be false for different structured arrays, where one array has different count', function (): void {
        $first = [1, 2];
        $second = [2 => 1, 1 => 0, 0 => -1];
        $third = ['one' => 1, 'two' => 2];

        $result = same_count($first, $second, $third);

        expect($result)->toBeFalsy();
    });
});
