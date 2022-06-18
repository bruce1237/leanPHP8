<?php

namespace lib;

class Cat extends Animal{
    public function speak()
    {
        echo $this->name. ' Meows';
    }
}