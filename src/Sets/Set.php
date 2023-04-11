<?php

namespace Maris\Collection\Sets;

use Maris\Collection\AbstractCollection;
use Maris\Collection\Interfaces\ListInterface;
use Maris\Collection\Interfaces\MapInterface;
use Maris\Collection\Interfaces\SetInterface;
use Maris\Collection\Lists\MutableList;
use Maris\Collection\Maps\Map;

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

<<<<<<< HEAD
    public function has( ...$values ): bool
=======
    public function contains(...$values ): bool
>>>>>>> 5c65f25 (Добавлены диапазоны)
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
<<<<<<< HEAD
            if($this->has($value)){
=======
            if($this->contains($value)){
>>>>>>> 5c65f25 (Добавлены диапазоны)
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
        return (new MutableList())->push();
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
<<<<<<< HEAD
        if(!$this->has($value))
=======
        if(!$this->contains($value))
>>>>>>> 5c65f25 (Добавлены диапазоны)
            $this->values[] = $value;
    }


}