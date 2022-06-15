<?php

namespace lib\traits;

class CoffeeMaker
{
   use CoffeeTrait;


   public function makeCoffee()
   {
       echo 'Making Cappuccino (UPDATED)' . PHP_EOL;
   }
}
