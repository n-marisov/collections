<?php

namespace Maris\Collection\Iterators;

use Iterator;
use Maris\Collection\Interfaces\CollectionInterface;

/***
 * Внешний итератор для переборки карт.
 */
class MapIterator implements Iterator
{
    protected int $position = 0;
    /**
     * @var array{ int:array{string:mixed} }
     */
    protected array $values;
    public function __construct( protected CollectionInterface $map ){
        $this->values = $map->toArray();
    }

    /**
     * @inheritDoc
     */
    public function current(): mixed
    {
        return $this->values[ $this->position ][ "value" ];
    }

    /**
     * @inheritDoc
     */
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * @inheritDoc
     */
    public function key(): mixed
    {
        return $this->values[ $this->position ][ "key" ] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function valid(): bool
    {
        return $this->position < $this->map->count();
    }

    /**
     * @inheritDoc
     */
    public function rewind(): void
    {
        $this->position = 0;
    }
}