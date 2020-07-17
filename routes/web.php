<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books/search', 'BookController@search')->name('books.search');
Route::resource('books', 'BookController');
Route::resource('stores', 'StoreController');
Route::resource('categories', 'CategoryController');
Route::resource('addresses', 'AddressController');

// Route::get('/books', 'BookController@index')->name('books.index');
// Route::get('/books/create', 'BookController@create')->name('books.create');
// Route::post('/books', 'BookController@store')->name('books.store');
// Route::get('/books/{id}/edit', 'BookController@edit')->name('books.edit');
// Route::put('/books/{id}', 'BookController@update')->name('books.update');
// Route::delete('/books', 'BookController@destroy')->name('books.destroy');
// Route::get('/books/{id}', 'BookController@show')->name('books.show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
