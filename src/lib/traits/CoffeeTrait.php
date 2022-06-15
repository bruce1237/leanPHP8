<?php
namespace lib\traits;

trait CoffeeTrait{
    public function makeCoffee()
    {
        echo static::class . ' is making coffee'.PHP_EOL;
    }
}