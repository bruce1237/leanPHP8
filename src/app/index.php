<?php
namespace app;

include __DIR__.'/../../vendor/autoload.php';

use lib\Profile;
use lib\Transaction;
use lib\TransactionStatus;

$profile = new Profile();
echo $profile->getProfile();

$transaction = new Transaction();
echo $transaction->getTransaction();
echo $transaction->setStatus(TransactionStatus::Paid);