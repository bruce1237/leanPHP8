<?php
namespace app;

include __DIR__.'/../../vendor/autoload.php';

use lib\Profile;
use lib\StaticClassA;
use lib\StaticClassB;
use lib\Transaction;
use lib\TransactionStatus;
use lib\CloneClass;

$profile = new Profile();
echo $profile->getProfile();

$transaction = new Transaction();
echo $transaction->getTransaction();
echo $transaction->setStatus(TransactionStatus::Paid);

echo '-----------'.PHP_EOL;

$a = new StaticClassA();
$b = new StaticClassB();
echo $a->getName().PHP_EOL;
echo $b->getName().PHP_EOL;

$a = StaticClassA::make();
var_dump($a);
$b = StaticClassB::make();
var_dump($b);


$a = new CloneClass();
$b = $a;
$a->amount=200;
$b->amount=400;

echo $a->amount.PHP_EOL; //200
echo 'A: '.$a->amount.', B: '.$b->amount.PHP_EOL;

$c = new CloneClass();
$d = clone $c;

$c->amount=200;
echo 'C: '.$c->amount.', D: '.$d->amount.PHP_EOL;

$d->amount=400;
echo 'C: '.$c->amount.', D: '.$d->amount.PHP_EOL;
