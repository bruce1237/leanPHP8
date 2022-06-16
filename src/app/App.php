<?php

namespace app;

use lib\ClassIterator\Invoice;

class App
{
    public static Container $container;


    public function __construct()
    {
        static::$container = new Container();
        static::$container->set(SalesTaxService::class, fn()=>new SalesTaxService());
        static::$container->set(PaymentGatewayService::class, fn()=> new PaymentGatewayService);
        static::$container->set(EmailService::class, fn()=>new EmailService);

        static::$container->set(InvoiceService::class, function (Container $c) {
            return new InvoiceService(
                $c->get(SalesTaxService::class), 
                $c->get(PaymentGatewayService::class), 
                $c->get(EmailService::class));
        });


        // static::$container->test();
        static::$container->get(InvoiceService::class);
    }
}
