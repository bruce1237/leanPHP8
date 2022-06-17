<?php

use lib\ArrayUnpacking;
use lib\ClassIterator\Invoice;
use lib\Customer;
use lib\FinalConstant\InvoiceQuery;
use lib\NewCustomer;

include "./vendor/autoload.php";

$unpacking = new ArrayUnpacking();

$unpacking->OldUnpacking();

$unpacking->NewUnpacking();

echo 'New Keywods Initializer'.PHP_EOL;

$customer = New Customer();
var_dump($customer);

$newCustomer = new NewCustomer();
var_dump($newCustomer);


echo 'Final Const'.PHP_EOL;

echo InvoiceQuery::DEFAULT_LIMIT.PHP_EOL;