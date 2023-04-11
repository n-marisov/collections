<?php

namespace Maris\Collection\Interfaces;


use ArrayAccess;
use Countable;
use Iterator;

/***
 * Определяет лист.
 * У листа всегда упорядочены ключи.
 */
interface ListInterface extends CollectionInterface
{
    /**
     * Добавляет один или несколько элементов в конец листа
     * @param ...$values
     * @return $this
     */
    public function push( ...$values ):static;

    /**
     * Добавляет один или несколько элементов в начало массива
     * @param ...$values
     * @return $this
     */
    public function unshift( ...$values ):static;

    /**
     * Извлекает элемент из конца лист
     * @return mixed
     */
    public function pop():mixed;

    /**
     * Извлекает первый элемент листа
     * @return mixed
     */
    public function shift():mixed;

    /**
     * Указывает на существование значения в листе
     * @param mixed $value
     * @return bool
     */
    public function exist( mixed $value ):bool;

    /**
     * Приводит объект к объекту SetInterface
     * @return SetInterface
     */
    public function toSet():SetInterface;

    /**
     * Приводит объект к карте
     * @return MapInterface
     */
    public function toMap():MapInterface;
}