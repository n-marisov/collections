<?php

namespace Maris\Collection\Interfaces;
use Iterator;

/**
 * Интерфейс гарантирует что возвращаемый тип итераций callable
 */
interface CallableIteratorInterface extends Iterator
{
    public function current(): callable;
}