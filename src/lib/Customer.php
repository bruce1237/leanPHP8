<?php
namespace lib;

class Customer{
    public function __construct (public ?Address $address=null)
    {
        
        $this->address ??= new Address();
    }
}

class NewCustomer{
    public function __construct(public Address $address = new Address())
    {
        
    }
}