<?php

namespace Maris\Collection\Interfaces;


/**
 * Определяют коллекции которые способны
 * к математическим действиям на собой
 * и своими значениями.
 */
interface NumericCollectionInterface
{
    /**
     * Прибавляет число к каждому значению коллекции
     * @param int|float $summand
     * @param bool $mutable
     * @return $this
     */
    public function plus( int|float $summand, bool $mutable = true ):static;

    /**
     * Отнимает от каждого значения коллекции число
     * @param int|float $deductible
     * @param bool $mutable
     * @return $this
     */
    public function sub( int|float $deductible, bool $mutable = true  ):static;

    /**
     * Умножает все значения коллекции на число
     * @param int|float $multiple
     * @param bool $mutable
     * @return $this
     */
    public function multiply( int|float $multiple, bool $mutable = true  ):static;

    /**
     * Делит все значения коллекции на число.
     * При попытке деления на 0 не выбрасывает исключений
     * и нечего не делает.
     * @param int|float $divider
     * @param bool $mutable
     * @return $this
     */
    public function div( int|float $divider, bool $mutable = true  ):static;

    /**
     * @param int|float $divider
     * @param bool $mutable
     * @return $this
     */
    public function fdiv( int|float $divider, bool $mutable = true  ):static;

    /**
     * @param int|float $divider
     * @param bool $mutable
     * @return $this
     */
    public function intdiv( int|float $divider, bool $mutable = true  ):static;

    /**
     * @param int|float $divider
     * @return $this
     */
    public function fmod( int|float $divider, bool $mutable = true  ):static;

    /**
     * Возводит в степень.
     * Удаляет из коллекции все значения которые
     * невозможно возвести в данную степень.
     * @param int|float $exponent
     * @return $this
     */
    public function pow( int|float $exponent, bool $mutable = true ):static;

    /**
     * Извлекает из каждого значения числа квадратный корень
     * @return $this
     */
    public function sqrt( bool $mutable = true ):static;

    /**
     * Возвращает коллекцию e в степени каждого значения коллекции
     * @return $this
     */
    public function exp( bool $mutable = true ): static;

    /**
     * @return $this
     */
    public function expm1( bool $mutable = true ): static;

    /**
     * Приводит каждое значения коллекции к модулю от числа.
     * @return $this
     */
    public function abs( bool $mutable = true  ):static;

    /***
     * Округляет все дробные значения коллекции в большую сторону
     * @return $this
     */
    public function ceil( bool $mutable = true ):static;

    /***
     * Округляет все дробные значения коллекции в меньшую сторону
     * @return $this
     */
    public function floor( bool $mutable = true  ):static;

    /**
     * Округляет все дробные значения коллекции  функцией round();
     * @param int $precision
     * @param int $mode
     * @return $this
     */
    public function round( int $precision = 0, int $mode = PHP_ROUND_HALF_UP , bool $mutable = true ):static;

    public function sin( bool $mutable = true ):static;
    public function sinh( bool $mutable = true ):static;
    public function asin( bool $mutable = true ):static;
    public function asinh( bool $mutable = true ):static;

    public function cos( bool $mutable = true ):static;
    public function cosh( bool $mutable = true ):static;
    public function acos( bool $mutable = true ):static;
    public function acosh( bool $mutable = true ):static;

    public function tan( bool $mutable = true ):static;
    public function tanh( bool $mutable = true ):static;
    public function atan( bool $mutable = true ):static;
    public function atanh( bool $mutable = true ):static;

    /**
     * Обрабатываются функцией atan2.
     * Данные из коллекции передаются вторым параметром ($x)
     * @param float $y
     * @param bool $mutable
     * @return $this
     */
    public function atan2X(float $y, bool $mutable = true ):static;

    /**
     * Обрабатываются функцией atan2.
     * Данные из коллекции передаются первым параметром ($xy)
     * @param float $x
     * @param bool $mutable
     * @return $this
     */
    public function atan2Y(float $x, bool $mutable = true ):static;

    /**
     * @param float|int $side Катет треугольника
     * @param bool $mutable
     * @return $this
     */
    public function hypot( float|int $side, bool $mutable = true ):static;

    public function rad2deg( bool $mutable = true ):static;
    public function deg2rad( bool $mutable = true ):static;


    public function log( float $base = M_E , bool $mutable = true ):static;
    public function log10( bool $mutable = true ):static;
    public function log1p( bool $mutable = true ):static;

    /**
     * Вычисляет сумму всех значений в коллекции
     * @return float|int
     */
    public function sum():float|int;

    /**
     * Вычисляет произведение всех значений коллекции
     * @return float|int
     */
    public function product():float|int;

    /**
     * Возвращает наибольшее значение коллекции или null
     * если коллекция пуста
     * @return float|null|int
     */
    public function max():float|int|null;

    /**
     * Возвращает наименьшее значение коллекции или null
     * если коллекция пуста
     * @return float|null|int
     */
    public function min():float|int|null;

    /**
     * Очищает коллекцию от всех значений NaN
     * @return $this
     */
    public function clearNaN():static;

    /**
     * Очищает коллекцию от всех бесконечных значений
     * @return $this
     */
    public function clearInfinite():static;

    /**
     * Очищает коллекцию от всех бесконечных значений и NaN
     * @return $this
     */
    public function clearNanAndInfinite():static;
    /*
base_convert — Преобразование числа между произвольными системами счисления
bindec — Двоичное в десятичное
decbin — Переводит число из десятичной системы счисления в двоичную
dechex — Переводит число из десятичной системы счисления в шестнадцатеричную
decoct — Переводит число из десятичной системы счисления в восьмеричную
hexdec — Переводит число из шестнадцатеричной системы счисления в десятичную
octdec — Переводит число из восьмеричной системы счисления в десятичную
pi — Возвращает число Пи
     */
}