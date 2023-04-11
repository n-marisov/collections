<?php

namespace Maris\Collection\Interfaces;

/***
 * Интерфейс диапазонов
 */
interface RangeInterface extends CollectionInterface
{
    /**
     * Указывает на то что значение входит в диапазон
     * @param mixed $value
     * @return bool
     */
    public function in( mixed $value ):bool;

    /**
     * Указывает на то что значение является ячейкой диапазона
     * @param mixed $value
     * @return bool
     */
    public function contains( mixed $value ):bool;

    /**
     * Возвращает первый элемент диапазона
     * @return mixed
     */
    public function getFirst():mixed;

    /**
     * Возвращает последний элемент диапазона
     * @return mixed
     */
    public function getLast():mixed;

    /**
     * Возвращает шаг диапазона
     * @return int|float
     */
    public function getStep():mixed;

    /**
     * Указывает что переборка идет от меньшего к большему.
     * @return bool
     */
    public function isPositive():bool;
}