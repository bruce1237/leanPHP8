<?php
namespace lib\traits;

trait CappuccinoTrait{
    public function makeCappuccino()
    {
        echo static::class .' is making cappuccino '.PHP_EOL;
    }

    public function makeLatte()
    {
        echo static::class . 'is making latte from Cappuccino Trait'.PHP_EOL;
    }
}