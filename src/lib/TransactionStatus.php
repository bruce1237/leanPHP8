<?php

namespace lib;

enum TransactionStatus: string
{
    case Paid = 'paid';
    case UnPaid = 'unpaid';
    case Pending = 'pending';
    case Error = 'error';
}
