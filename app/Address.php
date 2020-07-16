<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['country', 'city', 'location', 'telephone'];

    protected function store(){
        return $this->belongsTo('App/Store');
    }
}
