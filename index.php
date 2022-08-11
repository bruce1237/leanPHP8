<?php

use app\Invoice;
use enums\InvoiceStatus;

require './vendor/autoload.php';

$invoice = new Invoice();

echo $invoice->all(InvoiceStatus::Paid);

//tryFrom(Enum value) return enum value object
var_dump(InvoiceStatus::tryFrom(3));


//call custom defined func
echo InvoiceStatus::tryFrom(2)->getCaseString();

var_dump(InvoiceStatus::tryFrom(3)->name);