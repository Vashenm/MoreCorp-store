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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/product/{id}', 'ProductController@read');

Route::post('/bid/create', 'BidController@create');

Route::post('/bid/create', ['uses' => 'BidController@create', 'as' => 'bid_create']);

Route::get('/dashboard', ['uses' => 'HomeController@view', 'as' => 'dashboard'])->middleware('auth');

Route::get('/admin/product/{id}', 'ProductController@adminRead');
Route::get('/admin/product/delete/{id}',['uses' => 'ProductController@delete','as'=>'delete']);
Route::get('/admin/product/edit/{id}', 'ProductController@adminReadEdit');
Route::post('/product/create', ['uses' => 'ProductController@create', 'as' => 'product_create']);
Route::post('/product/update', ['uses' => 'ProductController@update', 'as' => 'product_update']);

Route::get('/admin/create/product/', 'ProductController@adminCreate');