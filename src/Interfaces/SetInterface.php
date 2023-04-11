<?php

namespace Maris\Collection\Interfaces;

use ArrayAccess;
use Countable;
use IteratorAggregate;

interface SetInterface extends ArrayAccess, IteratorAggregate, Countable, CollectionInterface
{
    /**
     * Добавляет те элементы которые отсутствуют в коллекции
     * @param ...$values
     * @return $this
     */
    public function add( ...$values ):static;

    /**
     * Определяет наличие всех элементов в объекте (по значению)
     * @param mixed ...$values
     * @return bool
     */
    public function contains(...$values ): bool;

    /**
     * Удаляет те элементы которые присутствуют в коллекции
     * @param mixed ...$values
     * @return $this
     */
    public function delete( ...$values ):static;

    /**
     * Приводит объект к карте
     * @return MapInterface
     */
    public function toMap():MapInterface;

    /**
     * Приводит объект к листу
     * @return ListInterface
     */
    public function toList():ListInterface;
}