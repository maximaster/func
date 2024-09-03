<?php

declare(strict_types=1);

use function Maximaster\Func\mksort;

describe('mksort', function (): void {
    it('should sort by given integer keys', function (): void {
        $input = ['php', 'world', 'hello'];
        mksort($input, [2, 0, 1]);
        expect($input)->toBe([2 => 'hello', 0 => 'php', 1 => 'world']);
    });

    it('should sort by given string keys', function (): void {
        $input = ['blue' => '#0000FF', 'red' => '#FF0000', 'green' => '#00FF00'];
        mksort($input, ['red', 'green', 'blue']);
        expect($input)->toBe(['red' => '#FF0000', 'green' => '#00FF00', 'blue' => '#0000FF']);
    });

    it('should fail on unknown key', function (): void {
        $input = ['totally', 'fall'];

        expect(static fn () => mksort($input, [0, 3]))->toThrow('Ordered keys should not contain unknown input keys.');
    });

    it('should fail on diffrent key count', function (): void {
        $input = ['totally', 'fall'];

        expect(static fn () => mksort($input, [0]))->toThrow('Count on ordered keys and input should match.');
        expect(static fn () => mksort($input, [0, 1, 2]))->toThrow('Count on ordered keys and input should match.');
    });

    it('should fail on non uniq ordered keys', function (): void {
        $input = ['totally', 'fall'];

        expect(static fn () => mksort($input, [0, 0]))->toThrow('All ordered keys should be uniq.');
    });
});
