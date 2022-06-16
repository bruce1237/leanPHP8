<?php

use app\App;
use app\InvoiceService;

include __DIR__.'/vendor/autoload.php';


$app = new App();

App::$container->get(InvoiceService::class)->process(['name'=>'Geo'], 25);