<?php

namespace Maris\Collection\Lists;

use Maris\Collection\Interfaces\NumericCollectionInterface;
use Maris\Collection\Traits\NumericCollectionTrait;

/**
 * Лист гарантирует что все значения листа числовые
 */
class NumericList extends MutableList implements NumericCollectionInterface
{
    use NumericCollectionTrait;
    /**
     * @inheritDoc
     */
    public function offsetGet(mixed $offset): float|int|null
    {
        return parent::offsetGet($offset);
    }
    /**
     * @inheritDoc
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if(is_numeric($value))
            parent::offsetSet($offset, (is_string($value)) ? (float)$value : $value);
    }

}