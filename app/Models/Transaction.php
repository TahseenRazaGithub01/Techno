<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
		'sender_id',
		'sender_name',
		'sender_mobile',
		'receiver_id',
		'receiver_name',
		'bank_name',
		'account_number',
		'transaction_date',
		'transaction_type',
		'pak_rupees',
		'omani_riyal',
		'customer_statement',
    ];
}
