<?php

namespace lib;

class ArrayUnpacking
{
    public function __construct(
        public array $arrA = [1, 2, 3],
        public array $arrB = [4, 5, 6],
    ) {
    }


    public function OldUnpacking()
    {
        $arrC = [...$this->arrA, ...$this->arrB];
        print_r($arrC);
    }

    /**
     * for array unpacking with string key, will work on php8.1+
     * if the key is same, the same key will be overwritten
     *
     * @return void
     */
    public function NewUnpacking()
    {
        $this->arrA['a'] = 'abc';
        $arrC = [...$this->arrA, ...$this->arrB];
        print_r($arrC);
    }
}
