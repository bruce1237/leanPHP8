<?php

namespace enums;

/**
 * :int define the enum class data type
 * the enum data type can only be a single type,
 * union type will not allowed
 * 
 * case name and value must be unique
 * 
 */
enum InvoiceStatus: int
{
    //assign default value
    case Pending = 0;
    case Paid = 1;
    case Void = 2;
    case Failed = 3;

    public function getCaseString()
    {
        var_dump($this->name);
die('CCC');
        return $this->name;
    }
}
