<?php

namespace Maris\Collection\Iterators;

use Iterator;
use Maris\Collection\Interfaces\CollectionInterface;

/**
 * Внешний итератор для листа
 */
class ListIterator implements Iterator
{
    protected int $position = 0;

    protected array $values = [];

    public function __construct( protected CollectionInterface $list )
    {
    }
    /**
     * @inheritDoc
     */
    public function current(): mixed
    {
        return $this->values[ $this->position ];
    }

    /**
     * @inheritDoc
     */
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * Возвращает позицию к предыдущему элементу
     * @return void
     */
    public function prev():void
    {
        --$this->position;
    }

    /**
     * Устанавливает позицию на последний элемент
     * @return void
     */
    public function end():void
    {
        $this->position = $this->list->count() - 1;
    }


    /**
     * @inheritDoc
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @inheritDoc
     */
    public function valid(): bool
    {
        return $this->position < $this->list->count();
    }

    /**
     * @inheritDoc
     */
    public function rewind(): void
    {
        $this->position = 0;
        $this->values = $this->list->toArray();
    }
}