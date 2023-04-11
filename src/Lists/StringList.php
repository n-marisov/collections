<?php

namespace Maris\Collection\Lists;


use Stringable;

/**
 * Лист хранит внутри себя только строковые значения
 */
class StringList extends MutableList
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
        if( is_string($value) || is_a($value, Stringable::class))
            parent::offsetSet($offset, (string) $value);
    }
}