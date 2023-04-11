<?php

namespace Maris\Collection\Lists;

use Closure;
use Maris\Collection\Interfaces\SuperintendCollectionInterface;

/**
 * Лист добавление значений в который происходит
 * только по одобрению функции переданной в конструктор.
 */
class SuperintendList extends MutableList implements SuperintendCollectionInterface
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