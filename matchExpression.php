<?php

/**
 * Difference between Match and Switch
 * Match 
 * * does Identical comparsion(===)
 * * does single line of code
 * * the case can be function or code: 1>2 => 'this is a case'
 * 
 * Switch 
 * * does Equal comparsion (==)
 * * does multiple lines of code
 */


$paymentStatus = false;
switch ($paymentStatus) {
    case 1:
        echo 'Paid';
        break;
    case 2:
    case 3:
        echo 'Payment Declined';
        break;

    case 0:
        echo 'Pending Payment';
        break;
    default:
        echo 'Unknown Payment Status';
}

match ($paymentStatus) {
    1 => print('Paid'),
    2, 3 => print('Payment Declined'),
    0 => print('Pending Payment'),
    default => print('Unknown Payment Status'),
};
$paymentStatusText = match ($paymentStatus) {
    2>3 =>'Do know', //if tghe $paymentStatus == false as 2>3 returns
    1 => 'Paid',
    2, 3 => 'Payment Declined',
    0 => 'Pending Payment',
    default => 'Unknown Payments Status',
};

echo $paymentStatusText;
