<?php
class Transaction{
    public function __construct(
        private float $amount,
        public string $descripton
    )
    {
        
    }
}



$tr = new Transaction(12.3,'abc');
echo $tr->descripton;