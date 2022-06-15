<?php
namespace lib\ClassIterator;

class InvoiceCollection implements \IteratorAggregate{
    
    public function __construct(public array $invoices)
    {
    }
    
    public function getIterator()
    {
        return new \ArrayIterator($this->invoices);
    }
}
