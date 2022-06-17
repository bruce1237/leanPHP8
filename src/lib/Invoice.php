<?php
namespace lib;

class Invoice{
    public function __destruct ()
    {
        echo "Destruct is Called".PHP_EOL;
    }
}