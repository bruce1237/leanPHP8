<?php
namespace lib;

class CatShelter implements AnimalShelter{
    public function adopt(string $name): Cat
    {
        return new Cat($name);
    }
}