<?php

namespace Maris\Collection\Sets;

use Maris\Collection\Interfaces\CallableIteratorInterface;
use Maris\Collection\Iterators\CallableListIterator;
use Traversable;
class CallableSet extends Set
{
    /**
     * @param int|null $offset
     * @return callable
     */
    public function offsetGet(mixed $offset): callable
    {
        return parent::offsetGet($offset);
    }

    /**
     * @param int|null $offset
     * @param callable $value
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if(is_callable($value))
            parent::offsetSet($offset, $value);
    }

    public function getIterator(): CallableIteratorInterface
    {
        return new CallableListIterator( $this );
    }
}