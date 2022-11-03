<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
    	'name',
		'description',
		'status',
    ];

    public function meta(){
        return $this->hasOne(PostMetas::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
                    //->select('id','name','email')
                    //;
    }

    public function tags(){
        return $this->belongsToMany(Tags::class);
    }

    public function comments(){
        return $this->hasMany(comments::class)->whereNull('parent_id');
    }

}
