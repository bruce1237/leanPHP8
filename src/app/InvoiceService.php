<?php
namespace app;

use PhpParser\Node\Expr\Cast\Bool_;

class InvoiceService{

    public function __construct(
        protected SalesTaxService $salesTaxService,
        protected PaymentGatewayService $paymentGatewayService,
        protected EmailService $emailService
    )
    {
        
    }

    /**
     * Undocumented function
     *
     * @param array $customer
     * @param float $amount
     * @return boolean
     */
    public function process(array $customer, float $amount):bool
    {
        echo __CLASS__." Process";
          //1. calculate sales tax
          $tax = $this->salesTaxService->calculate($customer, $amount);

          //2. process invoice
          if(! $this->paymentGatewayService->charge($customer,$amount,$tax)){
              return false;
          }
  
          //3. send receipt
          $this->emailService->send($customer, 'receipt');
  
          return true;
    }

    /**
     * the following method depending on other class/object, 
     * it is difficult to maintain and test
     *
     * @param array $customer
     * @param float $amount
     * @return boolean
     */
    public static function OldProcess(array $customer, float $amount): bool
    {
        $salesTaxService = new SalesTaxService();
        $gatewayService = new PaymentGatewayService();
        $emailService = new EmailService();

        //1. calculate sales tax
        $tax = $salesTaxService->calculate($customer, $amount);

        //2. process invoice
        if(! $gatewayService->charge($customer,$amount,$tax)){
            return false;
        }

        //3. send receipt
        $emailService->send($customer, 'receipt');

        return true;
    }
}