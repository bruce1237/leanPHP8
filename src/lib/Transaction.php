<?php
namespace lib;

class Transaction{
    public $status;

    public function getTransaction()
    {
        return 'Transaction'.PHP_EOL;
    }

    public function setStatus(TransactionStatus $transactionStatus)
    {
        var_dump($transactionStatus->cases());
        // var_dump($transactionStatus->from());
        var_dump($transactionStatus->name);
        // var_dump($transactionStatus->tryFrom());
        var_dump($transactionStatus->value);
        die('cc');
        return $this->status = $transactionStatus->name;    
    }
}