<?php
namespace lib;

class Dog extends Animal{
    public function speak()
    {
        echo $this->name.' woof';
    }

    public function eat(Food $food)
    {
        echo $this->name . " eats ".get_class($food);
    }
}