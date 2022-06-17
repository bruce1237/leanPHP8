<?php

use lib\Invoice;

include "./vendor/autoload.php";

$invoice1 = New Invoice();
// $invoice2 = $invoice1;

// unset($invoice1);

// var_dump($invoice2);


// for WeakMap

$map = new WeakMap();
$map[$invoice1]= ['a'=>1, 'b'=>2,'c'=>3];

var_dump($map);


unset($invoice1);
var_dump($map);