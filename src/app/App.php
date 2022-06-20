<?php

namespace app;

use Exception;
use lib\ClassIterator\Invoice;
use view\View;

class App
{
    // public static Container $container;

    public function __construct(protected Container $container, protected Router $router, protected array $request)
    {
       
    }

    // public function __construct()
    // {
    //     static::$container = new Container();
    //     static::$container->set(SalesTaxService::class, fn()=>new SalesTaxService());
    //     static::$container->set(PaymentGatewayService::class, fn()=> new PaymentGatewayService);
    //     static::$container->set(EmailService::class, fn()=>new EmailService);

    //     static::$container->set(InvoiceService::class, function (Container $c) {
    //         return new InvoiceService(
    //             $c->get(SalesTaxService::class), 
    //             $c->get(PaymentGatewayService::class), 
    //             $c->get(EmailService::class));
    //     });


    //     // static::$container->test();
    //     static::$container->get(InvoiceService::class);
    // }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));
        } catch (Exception $e) {
            print_r($e->getMessage());
            http_response_code(404);

            echo View::make('error/404');
        }
    }
}
