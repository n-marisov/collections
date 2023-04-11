<?php

namespace Maris\Collection\Interfaces;

use Maris\Collection\Set;

/***
 * Реализует карту где в качестве
 * ключей можно использовать все что угодно.
 *
 * @template K as mixed
 * @template V as mixed
 * @implements CollectionInterface
 */
interface MapInterface extends CollectionInterface
{
    /**
     * Определяет наличие элемента в карте по ключу
     * @param $key
     * @return bool
     */
    public function has( $key ):bool;

    /**
     * Определяет наличие элемента в карте по значению
     * @param $value
     * @return bool
     */
    public function exists( $value ): bool;

    /**
     * Устанавливает значение
     * @param $key
     * @param $value
     * @return $this
     */
    public function set( $key, $value ):static;

    /**
     * Наполняем карту,
     * используя один iterable в качестве ключей,
     * а другой для его значений.
     * Ключи массивов (iterable) не сопоставляются
     * по значению учитывается только позиция.
     * @param iterable $keys
     * @param iterable $values
     * @return $this
     */
    public function combine( iterable $keys, iterable $values ): static;

    /**
     * Получает значение по ключу
     * @param $key
     * @return mixed
     */
    public function get( $key ):mixed;

    /**
     * Удаляет ячейку по ключу
     * @param $key
     * @return $this
     */
    public function remove( $key ):static;

    /**
     * Удаляет ячейку по значению
     * @param $value
     * @return $this
     */
    public function delete( $value ):static;

    /**
     * Возвращает все ключи карты
     * @return iterable
     */
    public function keys():iterable;

    /**
     * Возвращает все значения карты
     * @return iterable
     */
    public function values():iterable;

    /**
     * Создает лист на основе значений
     * @return ListInterface
     */
    public function toList():ListInterface;

    /**
     * Создает SetInterface на основе значений
     * @return SetInterface
     */
    public function toSet():SetInterface;

    /**
     * Создает лист на основе ключей
     * @return ListInterface
     */
    public function toKeysList():ListInterface;

    /**
     * Создает SetInterface на основе ключей
     * @return SetInterface
     */
    public function toKeysSet():SetInterface;

}