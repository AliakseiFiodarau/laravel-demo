<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'email', 'name', 'phone_number', 'text', 'status'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
