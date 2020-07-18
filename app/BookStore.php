<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookStore extends Model
{
    protected $table = 'book_store';

    protected function store(){
        return $this->belongsTo('App\Store');
    }

    protected function book(){
        return $this->belongsTo('App\Book');
    }
}
