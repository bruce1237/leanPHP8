<?php
namespace app\controllers;

use app\attributes\Route;
use app\InvoiceService;
use view\View;

class HomeController{
    public function __construct(private InvoiceService $invoiceService)
    {
        
    }

    //example of attributes

    #[Route('/')]
    public function index()
    {
        $this->invoiceService->process([],25);
        return View::make('index');
    }
}