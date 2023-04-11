<?php

namespace Maris\Collection;

use Maris\Collection\Interfaces\ListInterface;
use Maris\Collection\Interfaces\MapInterface;
use Maris\Collection\Interfaces\SetInterface;
use Maris\Collection\Iterators\IterableIterator;

class Map extends AbstractCollection implements MapInterface
{
    protected array $keys = [];
    public function has( $key ): bool
    {
        return in_array( $key, $this->keys,true );
    }

    public function exists( $value ): bool
    {
        return in_array( $value, $this->values,true );
    }

    public function set( $key, $value ): static
    {
        if( !$this->has($key) ) $this->count++;
        $this->keys[] = $key;
        $this->values[] = $value;
        return $this;
    }

    public function get( $key ): mixed
    {
        foreach ($this->keys as $position => $item)
            if($key == $item) return $this->values[$position];
        return null;
    }

    public function remove($key): static
    {
        foreach ($this->keys as $position => $item)
            if($item === $key){
                $this->count--;
                unset( $this->values[$position] );
                unset( $this->keys[$position] );
            }
        $this->values = array_values( $this->values );
        $this->keys = array_values( $this->keys );
        return $this;
    }

    public function delete( $value ): static
    {
        foreach ($this->values as $position => $item)
            if($item === $value){
                $this->count--;
                unset( $this->values[$position] );
                unset( $this->keys[$position] );
            }
        $this->values = array_values( $this->values );
        $this->keys = array_values( $this->keys );
        return $this;
    }

    public function keys(): iterable
    {
        return $this->keys;
    }

    public function values(): iterable
    {
        return $this->values;
    }

    public function toList(): ListInterface
    {
        return ( new ArrayList() )->push( ...$this->values() );
    }

    /**
     * @inheritDoc
     */
    public function toSet(): SetInterface
    {
        return ( new Set() )->add( ...$this->values() );
    }

    /**
     * @inheritDoc
     */
    public function toKeysList(): ListInterface
    {
        return ( new ArrayList() )->push( ...$this->keys() );
    }

    /**
     * @inheritDoc
     */
    public function toKeysSet(): SetInterface
    {
        return ( new Set() )->add( ...$this->keys() );
    }
    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $result = [];
        foreach ($this->values as $position => $value)
            $result[] = [
                "key" => $this->keys[$position],
                "value" => $value
            ];
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists(mixed $offset): bool
    {
        return $this->has( $offset );
    }

    /**
     * @inheritDoc
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if($this->has( $offset )){
            $position = array_search( $offset, $this->keys );
            $this->values[ $position ] = $value;
        }else{
            $this->keys[] = $offset;
            $this->values[] = $value;
            $this->count++;
        }
    }

    /**
     * @inheritDoc
     */
    public function combine( iterable $keys, iterable $values ): static
    {
        $keys = array_values( iterator_to_array( new IterableIterator($keys) ) );
        $values = array_values( iterator_to_array( new IterableIterator( $values ) ) );
        $count = min( count($keys), count($values) );
        for ($i = 0; $i < $count;$i++)
            $this->set( $keys[$i], $values[$i] );

        return $this;
    }
}