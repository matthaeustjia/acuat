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
Route::get('/api/item', 'ItemController@searchApi');


//Invoice Masuk Contoller
Route::get('/invoicemasuk', 'InvoiceMasukController@index');
Route::post('/invoicemasuk', 'InvoiceMasukController@store');
Route::delete('/invoicemasuk/{invoicemasuk}', 'InvoiceMasukController@destroy');
Route::patch('/invoicemasuk/{invoicemasuk}', 'InvoiceMasukController@update');
Route::get('/invoicemasuk/manufacturer', 'InvoiceMasukController@manufacturer');
Route::get('/invoicemasuk/{invoicemasuk}', 'InvoiceMasukController@show');

//Invoice Keluar Controller
Route::get('/invoicekeluar', 'InvoiceKeluarController@index');
Route::post('/invoicekeluar', 'InvoiceKeluarController@store');


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
Route::post('/itemmasuk/{id}', 'ItemMasukController@store');
Route::delete('/itemmasuk/{itemmasuk}', 'ItemMasukController@destroy');
