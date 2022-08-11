<?php
namespace app;

use enums\InvoiceStatus;

class Invoice
{


     /**
      * using Enums as Params Type
      *
      * @param InvoiceStatus $status is object
      * @return string
      */
    public function all(InvoiceStatus $status):string
    {
        //to access enum class case name and value
        // var_dump($status->name);
        // var_dump($status->value);
        return $status->name . ' value is '. $status->value.PHP_EOL;
    }
}