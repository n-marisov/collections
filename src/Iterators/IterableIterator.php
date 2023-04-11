<?php

namespace Maris\Collection\Iterators;

use Iterator;

/**
 * Итератор обертка для всех типов iterable
 */
class IterableIterator implements Iterator
{
    protected int $count = 0;

    protected int $position = 0;

    protected array $keys = [];

    protected array $values = [];

    public function __construct( iterable $iterable )
    {
        foreach ($iterable as $key => $value){
            $this->keys[] = $key;
            $this->values[] = $value;
            $this->count++;
        }
    }


    public function current(): mixed
    {
        return $this->values[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }

    public function key(): mixed
    {
        return $this->keys[$this->position];
    }

    public function valid(): bool
    {
        return $this->count > $this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}