<?php

namespace Maris\Collection\Maps;

/***
 * Карта в которой все ключи являются названиями класса
 */
class PointerClassMap extends Map
{
    /**
     * @param class-string $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if(is_string( $value ) && class_exists( $value ))
            parent::offsetSet( $offset , $value );
    }

}