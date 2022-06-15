<?php
namespace lib\traits;

class AllInOneCoffeeMaker extends CoffeeMaker{

    use CappuccinoTrait {
        // using alias the function name
        LatteTrait::makeLatte as makeOriginalLatte;

        //change the visibality keyword
        LatteTrait::makeLatte as private;
    }

    //indicate when calling makeLatte(), using LatteTrai::makeLatte() instead of CappuccinoTrait::makeLatte
    use LatteTrait {
        LatteTrait::makeLatte insteadof CappuccinoTrait;
    }

   

}