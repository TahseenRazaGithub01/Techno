<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
    	'email',
		'page_url',
		'latitude',
		'longitude',
    ];
}