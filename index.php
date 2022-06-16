<?php

use app\Container;
use app\EmailService;
use app\InvoiceService;
use app\PaymentGatewayService;
use app\SalesTaxService;

include __DIR__.'/vendor/autoload.php';


// $app = new App();

// App::$container->get(InvoiceService::class)->process(['name'=>'Geo'], 25);

//refactor Container
$container = new Container();
$container->set(SalesTaxService::class, fn()=>new SalesTaxService());
$container->set(PaymentGatewayService::class, fn()=> new PaymentGatewayService);
$container->set(EmailService::class, fn()=>new EmailService);

$container->get(InvoiceService::class)->process(['name'=>'Geo'], 25);
// (new Container())->get(InvoiceService::class)->process(['name'=>'Geo'], 25);

// $className = 'app\InvoiceService';
// $refClass = new ReflectionClass($className);

// $constructor = $refClass->getConstructor();
// $constructorParams = $constructor->getParameters();

// var_dump($constructor);
// var_dump($constructorParams);
 
// $dependencies = array_map(function(ReflectionParameter $params) use($className){
//     echo 'Params'.PHP_EOL;
//     var_dump($params);
//     $name = $params->getName();
//     $type = $params->getType();
    
//     echo 'Name'.PHP_EOL;
//     var_dump($name);

//     echo 'Type'.PHP_EOL;
//     var_dump($type);
//     echo 'Type->getName()'.PHP_EOL;
//     var_dump($type->getName());
//     echo 'ClassName'.PHP_EOL;
//     var_dump($className);
//     echo '-----------'.PHP_EOL;

// }, $constructorParams); 