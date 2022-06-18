<?php
namespace lib;

interface AnimalShelter{
     public function adopt(string $name): Animal;
}