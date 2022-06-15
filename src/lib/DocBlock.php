<?php
namespace lib;

class DocBlock{
    private Transaction $trans;
    private float|int $amount;



    public function foo(array $trans):void
    {
        // using @var to indication the variable $tran is Transaction obj
        /** @var Transaction $tran */
        foreach($trans as $tran){
            $tran->getTransaction();
        }
    }



    /**
     * using'@ param' to indicate the variable type as ARRAY of Transaction objs
     *
     * @param Transaction[] $trans
     * @return void
     */
    public function foo1(array $trans):void
    {
        foreach($trans as $tran){
            $tran->getTransaction();
        }
    }
}