<?php

namespace Maris\Collection\Iterators;

use Maris\Collection\Interfaces\CallableIteratorInterface;

class CallableListIterator extends ListIterator implements CallableIteratorInterface
{
    public function current(): callable
    {
        return parent::current();
    }

}