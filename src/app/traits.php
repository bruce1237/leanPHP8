<?php
namespace app;

use lib\traits\AllInOneCoffeeMaker;
use lib\traits\CappuccinoMaker;
use lib\traits\CoffeeMaker;
use lib\traits\LatteMaker;

include __DIR__.'/../../vendor/autoload.php';


$coffeeMaker = new CoffeeMaker();
$coffeeMaker->makeCoffee();

$latteMaker = new LatteMaker();
$latteMaker->makeCoffee();
$latteMaker->makeLatte();

$cappuccinoMaker = new CappuccinoMaker();
$cappuccinoMaker->makeCoffee();
$cappuccinoMaker->makeCappuccino();

$allInOneCoffeeMaker = new AllInOneCoffeeMaker();
$allInOneCoffeeMaker->makeCoffee();
$allInOneCoffeeMaker->makeLatte();
$allInOneCoffeeMaker->makeCappuccino();
$allInOneCoffeeMaker->makeOriginalLatte();