<?php

declare(strict_types=1);

namespace Maximaster\Func;

use InvalidArgumentException;
use ReflectionException;
use ReflectionFunction;
use ReflectionNamedType;
use Webmozart\Assert\Assert;

/**
 * Input data for array_filter_recursive.
 */
class ArrayRecursiveFilter
{
    /** @psalm-var callable(mixed, array-key):bool */
    public $filter;

    /**
     * @throws InvalidArgumentException
     * @throws ReflectionException
     *
     * @psalm-param callable(mixed, array-key):bool $filter
     */
    public function __construct(callable $filter)
    {
        /** @psalm-suppress ArgumentTypeCoercion why:false-positive */
        $filterReflection = new ReflectionFunction($filter);
        $returnType = $filterReflection->getReturnType();
        if ($returnType instanceof ReflectionNamedType && $returnType->getName() !== 'boolean') {
            throw new InvalidArgumentException('The callback function must return a boolean value.');
        }

        if ($filterReflection->getNumberOfParameters() < 2) {
            throw new InvalidArgumentException('The callback function must accept two arguments.');
        }

        $this->filter = $filter;
    }

    /**
     * @psalm-param mixed $value
     * @psalm-param array-key $key
     */
    public function __invoke($value, $key): bool
    {
        Assert::validArrayKey($key, 'Array key must be int or string type.');

        return ($this->filter)($value, $key);
    }
}
