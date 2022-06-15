<?php

namespace lib\ClassIterator;

class Invoice
{
    public function __construct(public float $amount)
    {
        $this->id = mt_rand(1000, 9999);
    }
}
