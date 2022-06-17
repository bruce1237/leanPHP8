<?php
namespace example;

use Generator;

class GeneratorExample{

    public function index()
    {
        $numbers = $this->customerRange(1,10);
        print_r($numbers);
        echo $numbers->current().PHP_EOL; // 1 echo out the current value
        echo $numbers->next(); // move to next or resume the execution
        echo $numbers->current().PHP_EOL; // 2 echo out the current value
        echo $numbers->next(); // move to next or resume the execution
        echo $numbers->current().PHP_EOL; // 3 echo out the current value


        echo 'Start Yield Array'.PHP_EOL;

        $array = $this->yieldArray(1,10);

        foreach($array as $key=>$value){
            echo $key.'====>'.$value.PHP_EOL;
        }



        echo 'Start MULTI_YEILD'.PHP_EOL;
        $multiYield = $this->multiYield();
        for($i = 1; $i<5; $i++){

            echo "Calling Current()".PHP_EOL;
            $multiYield->current();
            // this ONLY work when the generator has iterated completed, this will throw exception as the iterator/generator has NOT completed
            // echo $multiYield->getReturn(); 
            echo "Calling Next()".PHP_EOL;
            $multiYield->next();

        }

        echo $multiYield->getReturn(); // this ONLY work when the generator has iterated completed
    }

    public function customerRange(int $start, int $end): Generator
    {
        echo "customerRange Been Called.".PHP_EOL;
        for ($i = $start; $i<=$end; $i++){
            yield $i;
        }
    }

    public function yieldArray(int $start, int $end):Generator
    {
        for($i=$start; $i<$end; $i++){
            yield $i*5 => $i;
        }
        
    }

    public function multiYield():Generator
    {
        echo 'MultiYield func1'.PHP_EOL;
        yield 'yield1';
        
        echo 'MultiYield func2'.PHP_EOL;
        yield 'yield2';

        echo 'MultiYield func3'.PHP_EOL;
        yield 'yield3';

        echo 'MultiYield func4'.PHP_EOL;
        yield 'yield4';

        return "THIS IS THE END".PHP_EOL;

    }
}