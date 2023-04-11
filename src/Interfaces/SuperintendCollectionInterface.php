<?php

namespace Maris\Collection\Interfaces;

/**
 * Интерфейс для коллекций добавление элементов в которые
 * происходит по разрешению функции.
 */
interface SuperintendCollectionInterface extends CollectionInterface
{
    /**
     * Функция, которая решает добавлять значение или нет,
     * если необходимо выбрасывать исключение, то выбрасывается в функции.
     * @param callable( mixed $value, mixed $key ):bool $predicate
     */
    public function __construct( callable $predicate );
}