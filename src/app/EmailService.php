<?php
namespace app;

class EmailService{
    public function send(array $customer, string $subject): bool
    {
        sleep(1);
        return true;
    }
}