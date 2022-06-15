<?php

namespace lib\traits;

class CappuccinoMaker extends CoffeeMaker
{

    use CappuccinoTrait;

    /**
     * OVERWRITE Trait function
     *
     * @return void
     */
    public function makeCoffee()
    {
        echo static::class. ' Making Cappuccino (UPDATED) (NEW)' . PHP_EOL;
    }
}
