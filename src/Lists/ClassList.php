<?php

namespace Maris\Collection\Lists;

/***
 * Лист хранит внутри себя только названия классов
 */
class ClassList extends MutableList
{
    /**
     * @param int $offset
     * @return class-string|null
     */
    public function offsetGet(mixed $offset): ?string
    {
        return parent::offsetGet($offset);
    }

    /**
     * @param int|null $offset
     * @param class-string $value
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if(is_string($value) && class_exists($value))
            parent::offsetSet($offset, $value);
    }

}