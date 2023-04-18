<?php

namespace Maris\Collection\Lists;


use Maris\Collection\AbstractCollection;
use Maris\Collection\Interfaces\ListInterface;
use Maris\Collection\Interfaces\MapInterface;
use Maris\Collection\Interfaces\SetInterface;
use Maris\Collection\Iterators\ListIterator;
use Maris\Collection\Maps\Map;
use Maris\Collection\Sets\Set;
use Traversable;

class MutableList extends AbstractCollection implements ListInterface
{
    /**
     * @inheritDoc
     */
    public function push( ...$values): static
    {
        foreach ($values as $value)
            $this->offsetSet(null, $value );
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function unshift(...$values): static
    {
        $data = $this->values;
        $count = $this->count;
        $this->values = [];
        $this->count = 0;
        foreach ($values as $value)
            $this->offsetSet(null, $value );
        $this->values = [ ...$this->values, ...$data ];
        $this->count += $count;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function pop(): mixed
    {
        if( $this->count > 0 ) $this->count--;
        return array_pop( $this->values );
    }

    /**
     * @inheritDoc
     */
    public function shift(): mixed
    {
        if( $this->count > 0 ) $this->count--;
        return array_shift( $this->values );
    }

    /**
     * @inheritDoc
     */
    public function contains(mixed $value): bool
    {
        return in_array( $value, $this->values,true );
    }

    /**
     * @inheritDoc
     */
    public function toSet(): SetInterface
    {
        return (new Set())->add( ...$this->values );
    }

    /**
     * @inheritDoc
     */
    public function toMap(): MapInterface
    {
        return (new Map())->combine( array_keys($this->values), $this->values );
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ListIterator($this);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet( mixed $offset, mixed $value ): void
    {
        if( is_numeric( $offset ) &&  $offset == (int)$offset ){
            if( $offset >= $this->count ){
                $this->values[$this->count] = $value;
                $this->count++;
            }else $this->values[ (int) $offset ] = $value;
        }else {
            $this->values[] = $value;
            $this->count++;
        }
    }

    /**
     * Применяет пользовательскую функцию к каждому значению листа
     * @param callable( mixed $value, int $positin):mixed $callback
     * @param mixed|null $arg
     * @return $this
     */
    public function walk( callable $callback, mixed $arg = null ):static
    {
        $values = $this->values;
        array_walk($values,function ( &$value, $position ) use ($callback) {
            $value = $callback( $value, $position );
        },$arg);
        $this->values = [];
        $this->count = 0;
        foreach ($values as $value)
            $this[] = $value;
        return $this;
    }

    /**
     * @param null|callable():bool $callback
     * @param int $mode
     * @return $this
     */
    public function filter( ?callable $callback = null, int $mode = 0 ):static
    {
        $this->values = array_filter( $this->values, $callback, $mode );
        $this->count = count( $this->values );
        return $this;
    }
}