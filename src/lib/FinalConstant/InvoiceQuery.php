<?php
namespace lib\FinalConstant;

class InvoiceQuery extends TableQuery{
    public const DEFAULT_LIMIT = 50;

    // as the FINAL_DEFAULT_LIMIT has marked with final, 
    // so it can not been overwritten
    // public const FINAL_DEFAULT_LIMIT = 55;
}