<?php

namespace Maris\Collection;

use Iterator;
use Maris\Collection\Interfaces\ListInterface;
use Maris\Collection\Interfaces\MapInterface;
use Maris\Collection\Interfaces\SetInterface;
use Maris\Collection\Iterators\ListIterator;
use Traversable;

class ArrayList extends AbstractCollection implements ListInterface
{
    protected Iterator $iterator;

    public function __construct()
    {
        $this->iterator = new ListIterator( $this );
    }

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
    public function exist(mixed $value): bool
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
        return $this->iterator;
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


}