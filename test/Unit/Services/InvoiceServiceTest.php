<?php

namespace test\Unit\Services;

use app\EmailService;
use app\InvoiceService;
use app\PaymentGatewayService;
use app\SalesTaxService;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{

    protected $salesTaxServiceMock;
    protected $gatewayServiceMock;
    protected $emailServiceMock;
    protected $invoiceService;

    public function testOldProcess(): void
    {
        /**
         * steps:
         * 1. given invoice service
         * 2. when process is called
         * 3. then assert invoice is processed successfully
         */

        //1.

        $customer = [
            'name' => 'Geo',
        ];
        $amount = 150;
        //2.
        $result = InvoiceService::OldProcess($customer, $amount);

        //3.
        $this->assertTrue($result);
    }


    /**
     * using TestDouble method to mock
     *
     * @return void
     */
    public function testProcessTestDouble(): void
    {
        //mock the service
        $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $gatewayServiceMock = $this->createMock(PaymentGatewayService::class);
        $emailServiceMock = $this->createMock(EmailService::class);

        //stubs: rewrite the method behaver
        $gatewayServiceMock->method('charge')->willReturn(true);

        //mock function always return NULL, 
        // as the calculate():float, that's why return float(0)
        // echo PHP_EOL;
        // var_dump($salesTaxServiceMock->calculate([],25));
        // return;

        $invoiceService = new InvoiceService($salesTaxServiceMock, $gatewayServiceMock, $emailServiceMock);
        $customer = [
            'name' => 'Geo',
        ];
        $amount = 150;
        $result = $invoiceService->process($customer, $amount);

        $this->assertTrue($result);
    }

    public function testSendEmailWhenInvoiceProcessSuccess(): void
    {
        $this->emailServiceMock
            ->expects($this->once())
            ->method('send')
            ->with(['name' => 'Geo'], 'receipt');

        $this->gatewayServiceMock->method('charge')->willReturn(true);
        $customer = [
            'name' => 'Geo',
        ];
        $amount = 150;
        $result = $this->invoiceService->process($customer,$amount);
        $this->assertTrue($result);
    }

    public function setUp(): void
    {
        //mock the service
        $this->salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $this->gatewayServiceMock = $this->createMock(PaymentGatewayService::class);
        $this->emailServiceMock = $this->createMock(EmailService::class);
        $this->invoiceService = new InvoiceService($this->salesTaxServiceMock, $this->gatewayServiceMock, $this->emailServiceMock);
    }
}
