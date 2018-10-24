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

Route::get('/', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Item Controller
Route::get('/item', 'ItemController@index');
Route::post('/item', 'ItemController@store');
Route::delete('/item/{item}', 'ItemController@destroy');
Route::get('item/search', 'ItemController@search');


//Invoice Masuk Contoller
Route::get('/invoicemasuk', 'InvoiceMasukController@index');
