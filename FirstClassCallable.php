<?php

function sum(float ...$num): float
{
    return array_sum($num);
}


$closure = Closure::fromCallable('sum');


var_dump($closure);

echo $closure(2,5).PHP_EOL;

//In PHP 8.1
echo 'PHP8.1------'.PHP_EOL;
$closure = sum(...);

var_dump($closure);

echo $closure(2,5).PHP_EOL;

