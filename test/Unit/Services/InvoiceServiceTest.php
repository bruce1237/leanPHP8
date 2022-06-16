<?php
namespace test\Unit\Services;

use app\InvoiceService;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase{

    public function testProcess(): void
    {
        /**
         * steps:
         * 1. given invoice service
         * 2. when process is called
         * 3. then assert invoice is processed successfully
         */

         //1.
         $invoiceService = new InvoiceService();

         $customer = [
            'name'=>'Geo',
         ];
         $amount = 150;
         //2.
         $result = $invoiceService->process($customer, $amount);

         //3.
         $this->assertTrue($result);


    }
}