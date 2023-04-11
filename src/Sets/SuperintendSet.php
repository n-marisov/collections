<?php

namespace Maris\Collection\Sets;

use Closure;
use Maris\Collection\Interfaces\SuperintendCollectionInterface;

/**
 * Set элементы в который добавляются только
 * по одобрению функции переданной в конструктор.
 */
class SuperintendSet extends Set implements SuperintendCollectionInterface
{

    /**
     * Функция надзиратель
     * @var Closure
     */
    protected Closure $superintendent;

    /**
     * @inheritDoc
     */
    public function __construct( callable $predicate )
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