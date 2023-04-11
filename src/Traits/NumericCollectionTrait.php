<?php

namespace Maris\Collection\Traits;

use Maris\Collection\AbstractCollection;
use Maris\Collection\Interfaces\NumericCollectionInterface;

/**
 * @implements NumericCollectionInterface
 * @psalm-var AbstractCollection
 */
trait NumericCollectionTrait
{
    protected int $count = 0;

    protected array $values = [];

    /**
     * Прибавляет число к каждому значению коллекции
     * @param int|float $summand
     * @param bool $mutable Редактировать текущий лист или создать новый.
     * @return $this
     */
    public function plus( int|float $summand, bool $mutable = true  ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] += $summand;
            return $this;
        }
        return ( clone $this )->plus( $summand,false );
    }

    /**
     * Отнимает от каждого значения коллекции число
     * @param int|float $deductible
     * @param bool $mutable
     * @return $this
     */
    public function sub( int|float $deductible, bool $mutable = true  ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] -= $deductible;
            return $this;
        }
        return ( clone $this )->sub( $deductible );
    }

    /**
     * Умножает все значения коллекции на число
     * @param int|float $multiple
     * @param bool $mutable
     * @return $this
     */
    public function multiply( int|float $multiple, bool $mutable = true  ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] *= $multiple;
            return $this;
        }
        return ( clone $this )->multiply( $multiple );
    }

    /**
     * Делит все значения коллекции на число.
     * При попытке деления на 0 не выбрасывает исключений
     * и нечего не делает.
     * @param int|float $divider
     * @param bool $mutable
     * @return $this
     */
    public function div( int|float $divider, bool $mutable = true  ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] /= $divider;
            return $this;
        }
        return ( clone $this )->div( $divider );
    }

    /**
     * @param int|float $divider
     * @param bool $mutable
     * @return $this
     */
    public function fdiv( int|float $divider, bool $mutable = true  ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = fdiv( $value, $divider );
            return $this;
        }
        return ( clone $this )->fdiv( $divider );
    }

    /**
     * @param int|float $divider
     * @param bool $mutable
     * @return $this
     */
    public function intdiv( int|float $divider, bool $mutable = true  ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = ($value - $value % $divider) / $divider;
            return $this;
        }
        return ( clone $this )->intdiv( $divider );
    }

    /**
     * @param int|float $divider
     * @param bool $mutable
     * @return $this
     */
    public function fmod( int|float $divider, bool $mutable = true  ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = fmod( $value, $divider );
            return $this;
        }
        return ( clone $this )->fmod( $divider );
    }

    /**
     * Возводит в степень.
     * @param int|float $exponent
     * @param bool $mutable
     * @return $this
     */
    public function pow( int|float $exponent, bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = pow( $value, $exponent );
            return $this;
        }
        return ( clone $this )->pow( $exponent );
    }

    /**
     * Извлекает из каждого значения числа квадратный корень
     * @return $this
     */
    public function sqrt( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = sqrt( $value );
            return $this;
        }
        return ( clone $this )->sqrt();
    }

    /**
     * Возвращает коллекцию e в степени каждого значения коллекции
     * @return $this
     */
    public function exp( bool $mutable = true ): static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = exp( $value );
            return $this;
        }
        return ( clone $this )->exp();
    }

    /**
     * @return $this
     */
    public function expm1( bool $mutable = true ): static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = expm1( $value );
            return $this;
        }
        return ( clone $this )->expm1();
    }

    /**
     * Приводит каждое значения коллекции к модулю от числа.
     * @return $this
     */
    public function abs( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = abs( $value );
            return $this;
        }
        return ( clone $this )->abs();
    }

    /***
     * Округляет все дробные значения коллекции в большую сторону
     * @return $this
     */
    public function ceil( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = ceil( $value );
            return $this;
        }
        return ( clone $this )->ceil();
    }

    /***
     * Округляет все дробные значения коллекции в меньшую сторону
     * @return $this
     */
    public function floor( bool $mutable = true  ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = floor( $value );
            return $this;
        }
        return ( clone $this )->floor();
    }

    /**
     * Округляет все дробные значения коллекции  функцией round();
     * @param int $precision
     * @param int $mode
     * @param bool $mutable
     * @return $this
     */
    public function round( int $precision = 0, int $mode = PHP_ROUND_HALF_UP , bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = round( $value , $precision, $mode );
            return $this;
        }
        return ( clone $this )->round( $precision, $mode );
    }

    public function sin( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = floor( $value );
            return $this;
        }
        return ( clone $this )->floor();
    }

    public function sinh( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = sinh( $value );
            return $this;
        }
        return ( clone $this )->sinh();
    }

    public function asin( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = asin( $value );
            return $this;
        }
        return ( clone $this )->asin();
    }

    public function asinh( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = asinh( $value );
            return $this;
        }
        return ( clone $this )->asinh();
    }


    public function cos( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = cos( $value );
            return $this;
        }
        return ( clone $this )->cos();
    }
    public function cosh( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = cosh( $value );
            return $this;
        }
        return ( clone $this )->cosh();
    }

    public function acos( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = acos( $value );
            return $this;
        }
        return ( clone $this )->acos();
    }
    public function acosh( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = acosh( $value );
            return $this;
        }
        return ( clone $this )->acosh();
    }

    public function tan( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = tan( $value );
            return $this;
        }
        return ( clone $this )->tan();
    }
    public function tanh( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = tanh( $value );
            return $this;
        }
        return ( clone $this )->tanh();
    }
    public function atan( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = atan( $value );
            return $this;
        }
        return ( clone $this )->atan();
    }
    public function atanh( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = atanh( $value );
            return $this;
        }
        return ( clone $this )->atanh();
    }
    public function atan2X(float $y, bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = atan2( $y, $value );
            return $this;
        }
        return ( clone $this )->atan2X( $y );
    }
    public function atan2Y(float $x, bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = atan2( $value , $x );
            return $this;
        }
        return ( clone $this )->atan2Y( $x );
    }


    /**
     * @param float|int $side Катет треугольника
     * @param bool $mutable
     * @return $this
     */
    public function hypot( float|int $side, bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = hypot( $value , $side );
            return $this;
        }
        return ( clone $this )->hypot( $side );
    }

    public function rad2deg( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = rad2deg( $value );
            return $this;
        }
        return ( clone $this )->rad2deg();
    }
    public function deg2rad( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = deg2rad( $value );
            return $this;
        }
        return ( clone $this )->deg2rad();
    }

    public function log( float $base = M_E , bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = log( $value, $base );
            return $this;
        }
        return ( clone $this )->log( $base );
    }
    public function log10( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = log10( $value );
            return $this;
        }
        return ( clone $this )->log10();
    }
    public function log1p( bool $mutable = true ):static
    {
        if($mutable){
            foreach ($this->values as $key => $value)
                $this->values[$key] = log1p( $value );
            return $this;
        }
        return ( clone $this )->log1p();
    }

    public function sum():float|int
    {
        return array_sum($this->values);
    }

    /**
     * Вычисляет произведение всех значений коллекции
     * @return float|int
     */
    public function product():float|int
    {
        return array_product( $this->values );
    }

    /**
     * Возвращает наибольшее значение коллекции или null
     * если коллекция пуста
     * @return float|null|int
     */
    public function max():float|int|null
    {
        return ($this->count === 0) ? null : max($this->values);
    }

    /**
     * Возвращает наименьшее значение коллекции или null
     * если коллекция пуста
     * @return float|null|int
     */
    public function min():float|int|null
    {
        return ($this->count === 0) ? null : min($this->values);
    }

    /**
     * Очищает коллекцию от всех значений NaN
     * @return $this
     */
    public function clearNaN():static
    {
        foreach ($this->values as $key => $value)
            if(is_nan($value))
                unset($this->values[$key]);
        $this->values = array_values($this->values);
        return $this;
    }

    /**
     * Очищает коллекцию от всех бесконечных значений
     * @return $this
     */
    public function clearInfinite():static
    {
        foreach ($this->values as $key => $value)
            if(is_infinite($value))
                unset($this->values[$key]);
        $this->values = array_values($this->values);
        return $this;
    }

    /**
     * Очищает коллекцию от всех бесконечных значений и NaN
     * @return $this
     */
    public function clearNanAndInfinite():static
    {
        foreach ($this->values as $key => $value)
            if(is_nan($value) || is_infinite($value))
                unset($this->values[$key]);
        $this->values = array_values($this->values);
        return $this;
    }
}