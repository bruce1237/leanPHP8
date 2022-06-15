<?php
namespace lib\traits;

trait LatteTrait{
    public function makeLatte()
    {
        echo static::class . ' is making latte from LatteTrait '.PHP_EOL;
    }
}