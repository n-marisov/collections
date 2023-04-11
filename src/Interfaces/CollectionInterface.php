<?php

namespace Maris\Collection\Interfaces;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use JsonSerializable;

/**
 * Представляет собой общий интерфейс коллекций.
 * Все коллекции являются итерируемыми, имеют
 * параметр длинны и доступны через синтаксис
 * квадратных скобок. Кроме того могут быть
 * приведены к массиву, полностью очищены от
 * значений и форматируются в виде
 * масиво-подобного объекта при дампе.
 * В каждой коллекции есть метод указывающий
 * на пустоту коллекции @see CollectionInterface::isEmpty()
 * Так же объект правильно стерилизуются в @see json_encode();
 *
 * @implements ArrayAccess
 * @implements Countable
 * @implements IteratorAggregate
 * @implements JsonSerializable
 * @template K as mixed
 * @template V as mixed
 */
interface CollectionInterface extends ArrayAccess, Countable, IteratorAggregate, JsonSerializable
{
    /**
     * Приводит объект к массиву
     * @return array
     */
    public function toArray():array;

    /**
     * Указывает на то что объект пустой
     * @return bool
     */
    public function isEmpty():bool;

    /**
     * Очищает объект от всех значений
     * @return $this
     */
    public function clear():static;

    /**
     * Форматирует вывод при дампе данных.
     * @internal
     * @return array
     */
    public function __debugInfo(): array;

    /**
     * @inheritDoc
     * @internal
     * @param K $offset
     * @return mixed
     */
    public function offsetGet( mixed $offset ): mixed;

    /**
     * @inheritDoc
     * @internal
     * @param K $offset
     * @return bool
     */
    public function offsetExists( mixed $offset ): bool;

    /**
     * @inheritDoc
     * @internal
     * @param K $offset
     * @return void
     */
    public function offsetUnset( mixed $offset ): void;

    /**
     * @inheritDoc
     * @internal
     * @param K $offset
     * @param V $value
     * @return void
     */
    public function offsetSet( mixed $offset, mixed $value ): void;
}