<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name'];

    protected function books(){
        return $this->belongsToMany('App\Book');
    }

    protected function addresses(){
        return $this->hasMany('App\Address');
    }

}
