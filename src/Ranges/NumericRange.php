<?php

namespace Maris\Collection\Ranges;

use Exception;
use Generator;
use Maris\Collection\Interfaces\RangeInterface;
use Traversable;

class NumericRange implements RangeInterface
{
    protected int $count;

    protected float|int $first;
    protected float|int $last;
    protected float|int $step;

    protected bool $positive;

    /**
     * @param float|int $first
     * @param float|int $last
     * @param float|int $step
     */
    public function __construct( float|int $first, float|int $last, float|int $step = 1)
    {
        $this->first = $first;
        $this->last = $last;
        $this->step = abs( $step );

        $this->positive = $last > $first;

        $this->count = abs(floor(($first - $last)/$step) ) + 1;
    }


    protected function generator(): Generator
    {
        if( $this->positive ) {
            for ($i = $this->first; $i <= $this->last; $i += $this->step) yield $i;
        }
        else for ($i = $this->first; $i >= $this->last; $i -= $this->step) yield $i;
    }


    public function toArray(): array
    {
        $data = [];
        foreach ($this->generator() as $value)
            $data[] = $value;
        return $data;
    }

    public function isEmpty(): bool
    {
        return false;
    }

    /**
     * @throws Exception
     */
    public function clear(): never
    {
        throw new Exception("Диапазон не может быть очищен.");
    }

    public function __debugInfo(): array
    {
        return $this->toArray();
    }

    public function offsetGet( mixed $offset ): float|int|null
    {
        if( $this->offsetExists( $offset ) ) {
            if( $this->positive ) {
                for ($i = $this->first; $i <= $this->last; $i += $this->step){
                    if($offset == 0) return $i;
                    --$offset;
                }
            }
            else for ($i = $this->first; $i >= $this->last; $i -= $this->step){
                if($offset == 0) return $i;
                --$offset;
            }
        }
        return null;
    }

    public function offsetExists(mixed $offset): bool
    {
        return is_numeric($offset) && (int) $offset == $offset && $offset < $this->count;
    }

    /**
     * @throws Exception
     */
    public function offsetUnset(mixed $offset): never
    {
        throw new Exception("Значение диапазона не может быть удалено !");
    }

    /**
     * @throws Exception
     */
    public function offsetSet(mixed $offset, mixed $value): never
    {
        throw new Exception("Значение диапазона не может быть установлено !");
    }

    public function getIterator(): Traversable
    {
        return $this->generator();
    }

    public function count(): int
    {
        return $this->count;
    }

    public function in( mixed $value ): bool
    {
        return is_numeric($value) && ($this->positive)
            ? $this->first <= $value && $this->last >= $value
            : $this->first >= $value && $this->last <= $value;
    }

    public function contains( mixed $value ): bool
    {
        foreach ($this->generator() as $item)
            if($value == $item)
                return true;
        return false;
    }

    /**
     * @return float|int
     */
    public function getFirst(): float|int
    {
        return $this->first;
    }

    /**
     * @return float|int
     */
    public function getLast(): float|int
    {
        return $this->last;
    }

    /**
     * @return float
     */
    public function getStep(): float
    {
        return $this->step;
    }

    /**
     * @return bool
     */
    public function isPositive(): bool
    {
        return $this->positive;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}