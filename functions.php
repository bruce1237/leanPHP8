<?php
// declare(strict_types=1);
/**
 * return value could be integer or null
 *
 * @param integer $int
 * @return integer|null
 */
function foo(int $int): ?int
{
    return 1;
}


/**
 * return multiple data types
 *
 * @param integer $int
 * @return string|integer|array|null
 */
function bar(int $int): string|int|array|null
{
    return 'abc';
}


/**
 * Mixed is unspecified return data type,
 * NOT recommended
 *
 * @param [type] $int
 * @return mixed
 */
function test($int): mixed
{
    return 'def';
}


/**
 * define multiple params data type
 *
 * @param integer|float $a
 * @param float|integer $b
 * @return float|integer
 */
function sum(int|float $a, float|int $b): float|int
{
    return $a * $b;
}

echo sum(1.75, 7);


function mins(int|float $a, float|int $b = 10, int $c = 0): float|int
{
    return $a - $b - $c;
}
echo PHP_EOL;
//pass arguments by reference
echo mins(b: 10, a: 8, c: 10);
echo PHP_EOL;
echo mins(a: 10, c: 8);


//... function

function sumUp($a, $b, $c): float
{
    return $a + $b + $c;
}

$arr = [
    'a' => 1,
    'b' => 2,
    'c' => 3
];
$arr2 = [1, 2, 3];

$arrWrong = [
    'a' => 1,
    'B' => 2,
    'c' => 3
];
echo PHP_EOL;
echo sumUp(...$arr);
echo PHP_EOL;
echo sumUp(...$arr2);
echo PHP_EOL;
// echo sumUp(...$arrWrong);


//anonymous function

$sum = function (int|float ...$numbers): int|float {
    return array_sum($numbers);
};
echo 'Anonymous Function' . PHP_EOL;
echo $sum(1, 2, 3, 4, 5);


echo 'Anonyouse functoin with access to out of scop variable' . PHP_EOL;
$outScopVar = 10;

//$outScopVar just copied, any alert with the variable WON'T affect the original variable
$sum = function (int ...$numbers) use ($outScopVar): int {
    $outScopVar = 1000;
    return array_sum($numbers) + $outScopVar;
};

echo $sum(1, 2, 3, 4) . PHP_EOL;
echo $outScopVar . PHP_EOL;


//  callable function

$array = [1, 2, 3, 4];
$array2 = array_map(function ($elements) {

    return $elements * 2;
}, $array);

var_dump($array);
var_dump($array2);



$sum = function (callable $callable, int ...$numbers): int {
    return $callable(array_sum($numbers));
};

echo 'callBack' . PHP_EOL;
echo $sum('fooo', 1, 2, 3, 4);

function fooo($element)
{
    return $element * 2;
}


// array function =>

//org function
$array = [1, 2, 3, 4];

$array2 = array_map(function($number){
    return $number*$number;
}, $array);

echo 'ORG Function'.PHP_EOL;
print_r($array2);

//using array function

$array = [1, 2, 3, 4];
$y = 3;

$array2 = array_map(fn($number)=>$number*$number+$y, $array);

echo 'array Function'.PHP_EOL;
print_r($array2);

echo $y;