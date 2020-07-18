<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'image', 'author', 'released_at', 'price', 'category_id'];

    protected function stores(){
        return $this->belongsToMany('App\Store')->using('App\BookStore');
    }

    protected function category(){
        return $this->belongsTo('App\Category');
    }
}
