<?php

require "classA.php";
require "classB.php";
use sun\classA;
use bo\classB;

$a = new classA();
$b = new classB();

echo $a->getName();
echo $b->getName();
