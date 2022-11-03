<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    protected $fillable = [
		'receiver_name',
		'bank_name',
		'account_number',
    ];
}
