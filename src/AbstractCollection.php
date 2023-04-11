<?php

namespace Maris\Collection;


use ArrayIterator;
use Maris\Collection\Interfaces\CollectionInterface;
use Traversable;

class AbstractCollection implements CollectionInterface
{
    protected int $count = 0;

    protected array $values = [];

    public function toArray(): array
    {
        return $this->values;
    }

    public function isEmpty(): bool
    {
        return $this->count === 0;
    }

    public function clear(): static
    {
        $this->count = 0;
        $this->values = [];
        return $this;
    }

    public function __debugInfo(): array
    {
        return $this->toArray();
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->values[ $offset ] ?? null;
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset( $this->values[ $offset ] );
    }

    public function offsetUnset(mixed $offset): void
    {
        if($this->offsetExists($offset)){
            unset( $this->values[ $offset ] );
            $this->count--;
        }
    }

    public function offsetSet( mixed $offset, mixed $value ): void
    {
        if( !$this->offsetExists($offset) )
            $this->count++;
        $this->values[$offset] = $value;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator( $this->values );
    }

    public function count(): int
    {
        return $this->count;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}