<?php

$arr =[
    'a'=>1,
    'b'=>2,
    'c'=>3
];

foreach($arr as $key=>$value){
    $$key = $value;
    echo $$key.PHP_EOL;
}


var_dump($arr);

echo $a;
echo $b;
