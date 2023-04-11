<?php

namespace Maris\Collection;

use Maris\Collection\Interfaces\ListInterface;
use Maris\Collection\Interfaces\MapInterface;
use Maris\Collection\Interfaces\SetInterface;

/**
 * Лист в котором хранятся только уникальные значения
 * Ключи не обеспечивают необходимой точности и должны
 * игнорироваться.
 * Может быть распакован оператором spread.
 */
class Set extends AbstractCollection implements SetInterface
{

    public function add(...$values): static
    {
        foreach ($values as $value)
            if(!in_array($value,$this->values,true))
                $this->values[] = $value;
        return $this;
    }

    public function has( ...$values ): bool
    {
        if(empty($values)) return false;
        foreach ($values as $value)
            if(!in_array($value,$this->values,true))
                return false;
        return true;
    }

    public function delete(...$values): static
    {
        foreach ($values as $key => $value)
            if($this->has($value)){
                $this->count--;
                unset($this->values[ $key ]);
            }
        $this->values = array_values($this->values);
        return $this;
    }

    public function toMap(): MapInterface
    {
        $map = new Map();
        foreach ($this->values as $key => $value)
            $map->set( $key, $value );
        return $map;
    }

    public function toList(): ListInterface
    {
        return (new ArrayList())->push();
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if(!$this->has($value))
            $this->values[] = $value;
    }


}