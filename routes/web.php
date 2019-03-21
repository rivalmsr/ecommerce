<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route product access by admin
Route::prefix('admin/products')->group(function(){
  Route::get('/','ProductController@index')->name('admin/products.index');
  Route::get('/create', 'ProductController@create')->name('admin/products.create');
  Route::post('/store', 'ProductController@store')->name('admin/products.store');
  Route::get('/{photo}', 'ProductController@show')->name('admin/products.show');
  Route::get('/{product_id}/edit', 'ProductController@edit')->name('admin/products.edit');
  Route::patch('/{product_id}', 'ProductController@update')->name('admin/products.update');
  Route::delete('/{product_id}', 'ProductController@delete')->name('admin/products.delete');
});
