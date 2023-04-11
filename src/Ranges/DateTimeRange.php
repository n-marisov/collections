<?php

namespace Maris\Collection\Ranges;

use DateInterval;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Generator;
use Maris\Collection\Interfaces\RangeInterface;
use Traversable;

class DateTimeRange implements RangeInterface
{
    protected int $count;
    protected DateTimeImmutable $first;
    protected DateTimeImmutable $last;
    protected DateInterval $step;

    protected bool $positive;

    /**
     * @param DateTimeInterface $first
     * @param DateTimeInterface $last
     * @param DateInterval $step Интервал
     */
    public function __construct(DateTimeInterface $first, DateTimeInterface $last, DateInterval $step = new DateInterval("P1D"))
    {
        $this->first = DateTimeImmutable::createFromInterface($first);
        $this->last = DateTimeImmutable::createFromInterface($last);

        $this->positive = $first < $last;

        $intStep = (new DateTimeImmutable("now"))
            ->setTimestamp(0)->add($step)->getTimestamp();
        $intFirstLast = abs($first->getTimestamp() - $last->getTimestamp());
        $this->count = abs(floor($intFirstLast / $intStep ) ) + 1;

        $this->step = $step;
    }

    /**
     * Возвращает интервал между датами.
     * @return DateInterval
     */
    public function getInterval():DateInterval
    {
        return ($this->positive) ? $this->first->diff( $this->last ) : $this->last->diff( $this->first );
    }


    protected function generator(): Generator
    {
        if($this->positive){
            for ( $i = $this->first; $i <= $this->last ; $i = $i->add($this->step))
                yield $i;
        }
        else for ( $i = $this->first; $i >= $this->last ; $i = $i->sub($this->step))
            yield $i;
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
    public function clear(): static
    {
        throw new Exception("Диапазон не может быть очищен.");
    }

    public function __debugInfo(): array
    {
        return $this->toArray();
    }

    public function offsetGet( mixed $offset ): null|DateTimeImmutable
    {
        if( $this->offsetExists( $offset ) ) {
            if( $this->positive ) {
                for ($i = $this->first; $i <= $this->last; $i = $i->add($this->step)){
                    if($offset == 0) return $i;
                    --$offset;
                }
            }else for ($i = $this->first; $i >= $this->last; $i = $i->sub($this->step)){
                if($offset == 0) return $i;
                --$offset;
            }
        }
        return null;
    }

    public function offsetExists( mixed $offset ): bool
    {
        return is_numeric($offset) && (int) $offset == $offset && $offset < $this->count;
    }

    /**
     * @throws Exception
     */
    public function offsetUnset(mixed $offset): void
    {
        throw new Exception("Значение диапазона не может быть удалено !");
    }

    /**
     * @throws Exception
     */
    public function offsetSet(mixed $offset, mixed $value): void
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
        return is_a($value, DateTimeInterface::class) && ($this->positive)
            ? $value >= $this->first && $value <= $this->last
            : $value <= $this->first && $value >= $this->last;
    }

    public function contains(mixed $value): bool
    {
        if(is_a($value, DateTimeInterface::class))
        foreach ($this->generator() as $item)
            if($value == $item)
                return true;
        return false;
    }

    public function getFirst(): DateTimeInterface
    {
        return $this->first;
    }

    public function getLast(): DateTimeInterface
    {
        return $this->last;
    }

    public function getStep(): DateInterval
    {
        return $this->step;
    }

    public function isPositive(): bool
    {
        return $this->positive;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}