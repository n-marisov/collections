<?php

namespace Maris\Collection\Maps;

use Closure;
use Maris\Collection\Interfaces\SuperintendCollectionInterface;

/**
 * Карта добавление значений в который происходит
 * только по одобрению функции переданной в конструктор.
 */
class SuperintendMap extends Map implements SuperintendCollectionInterface
{
    /**
     * Функция надзиратель
     * @var Closure
     */
    protected Closure $superintendent;

    /**
     * @inheritDoc
     */
    public function __construct(callable $predicate)
    {
        $this->superintendent = $predicate(...);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if( $this->superintendent->call( $this, $value, $offset) )
            parent::offsetSet($offset, $value);
    }
}