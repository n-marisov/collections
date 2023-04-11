<?php

namespace Maris\Collection\Sets;

use Maris\Collection\Interfaces\NumericCollectionInterface;
use Maris\Collection\Lists\MutableList;
use Maris\Collection\Traits\NumericCollectionTrait;

/**
 * Set гарантирует что все значения числовые
 */
class NumericSet extends MutableList implements NumericCollectionInterface
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
    public function offsetSet( mixed $offset, mixed $value ): void
    {
        if(is_numeric($value))
            parent::offsetSet($offset, (is_string($value)) ? (float)$value : $value);
    }
}