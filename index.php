<?php

use lib\AnimalFood;
use lib\CatShelter;
use lib\DogShelter;
use lib\Food;

include "./vendor/autoload.php";


// Covariance 
// example func-> adopt()

$kitty = (new CatShelter)->adopt('Ricky');
$kitty->speak();
echo PHP_EOL;
 
$doggy = (new DogShelter)->adopt('Woofy');
$doggy->speak();
echo PHP_EOL;




/**
 * in the interface AnimalShelter require adopt method to return an Animal Object
 * but in each individual shelter class(dogShelter & catShelter) require the adopt function
 * to return more specific object: Cat / Dog which is a sub class or Animal
 */



// contravariant

$catFood = new AnimalFood();
$kitty->eat($catFood);
echo PHP_EOL;
$banana = new Food();
$doggy->eat($banana);


/**
 * in this example, animal func eat can only eat AnimalFood object,
 * for Cat class which is fine.
 * but in Dog class, the eat func take Food object instead of AnimalFood, 
 * which expend the scope of AnimalFood object into larger food object
 */
