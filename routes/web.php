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
Route::patch('/item/{item}', 'ItemController@update');
Route::get('/item/search', 'ItemController@search');


//Invoice Masuk Contoller
Route::get('/invoicemasuk', 'InvoiceMasukController@index');
Route::get('/invoicemasuk/{invoicemasuk}', 'InvoiceMasukController@show');
Route::post('/invoicemasuk', 'InvoiceMasukController@store');
Route::delete('/invoicemasuk/{invoicemasuk}', 'InvoiceMasukController@destroy');
//Manufacturer
Route::get('/manufacturer', 'ManufacturerController@index');
Route::post('/manufacturer', 'ManufacturerController@store');
Route::delete('/manufacturer/{manufacturer}', 'ManufacturerController@destroy');
Route::get('/manufacturer/search', 'ManufacturerController@search');
Route::patch('/manufacturer/{manufacturer}', 'ManufacturerController@update');

//Customer Controller
Route::get('/customer', 'CustomerController@index');
Route::post('/customer', 'CustomerController@store');
Route::delete('/customer/{customer}', 'CustomerController@destroy');
Route::patch('/customer/{customer}', 'CustomerController@update');
Route::get('/customer/search', 'CustomerController@search');

//Item Masuk Controller
//Route::get('/itemmasuk', 'ItemMasukController@index');
Route::get('/itemmasuk/{id}', 'ItemMasukController@show');
