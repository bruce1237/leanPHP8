<?php
/**return / declare / goto */

//

// declare -ticks
function onTick(){
    echo 'Tick'.PHP_EOL;
}


// register a function for execution on each tick
register_tick_function('onTick');

declare(ticks=1); //define how many ticks to skip before call the register_tick_function

$i=0;
$length = 10;
while($i<$length){
    echo $i++.PHP_EOL;
}


// declare - strick_types
/** the strick_types declare only apply to the currenty file, 
 * won't apply to system or other files even the strick_types has been included or requred */

declare(strict_types=1);
function sum (float $a, float $b){
    return $a+$b;
}