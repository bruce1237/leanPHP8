<?php
//array_map

$array1 = ['a' => 1, 'b' => 2, 'c' => 3];
$array2 = ['d' => 4, 'e' => 5, 'f' => 6];
$array3 = ['x' => 7, 'y' => 8, 'z' => 9];
// $array = array_map(fn($a, $b, $c)=>$a+$b+$c,$array1, $array2, $array3);

$array = array_map('callback', $array1, $array2, $array3);
$array = array_map(null,$array1, $array2, $array3);

function callback($eachElementOfArray1, $eachElementOfArray2, $eachElementOfArray3)
{
    return $eachElementOfArray1 + $eachElementOfArray2 + $eachElementOfArray3;
}

print_r($array);


//array_reduce

$invoiceIterms = [
    ['price'=>9.99, 'qty'=>3, 'desc'=>'item1'],
    ['price'=>29.99, 'qty'=>1, 'desc'=>'item2'],
    ['price'=>149, 'qty'=>1, 'desc'=>'item3'],
    ['price'=>14.99,'qty'=>2, 'desc'=>'item4'],
    ['price'=>4.99, 'qty'=>4, 'desc'=>'item5'],
];

$total = array_reduce($invoiceIterms,fn($sum, $item)=>$sum + $item['price'] * $item['qty'], 100);

echo $total;