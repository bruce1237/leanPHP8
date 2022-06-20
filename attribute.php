<?php

use app\App;
use app\Container;
use app\controllers\HomeController;
use app\Router;

include __DIR__.'/vendor/autoload.php';

$container = new Container();
$router = new Router($container);
$router->registerRoutesFromControllerAttributes(
    [
        HomeController::class,
        Generator::class,
        
    ]
);

var_dump($router->routes());

(new App(
    $container, 
    $router,
    [
        'uri'=>'HomeController',
        'method'=>'get'
    ],
    ))->run();

