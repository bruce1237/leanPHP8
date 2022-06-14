<?php
namespace app;

include __DIR__.'/../../vendor/autoload.php';

use lib\Profile;
use lib\Transaction;

$profile = new Profile();
echo $profile->getProfile();

$transaction = new Transaction();
echo $transaction->getTransaction();
