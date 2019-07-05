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

Route::get('/', 'ProductController@index');

Auth::routes();

Route::get('/admin', 'Admin\AdminController@index');

Route::get('/admin/category', 'Admin\CategoryController@index');
Route::get('/admin/category/create', 'Admin\CategoryController@create');
Route::post('/admin/category/create', 'Admin\CategoryController@store');
Route::get('/admin/category/{id}', 'Admin\CategoryController@show');
Route::get('/admin/category/edit/{id}', 'Admin\CategoryController@edit');
Route::patch('/admin/category/edit/{id}', 'Admin\CategoryController@update');
Route::delete('/admin/category/delete', 'Admin\CategoryController@destroy');

Route::get('/admin/product', 'Admin\ProductController@index');
Route::get('/admin/product/create', 'Admin\ProductController@create');
Route::post('/admin/product/create', 'Admin\ProductController@store');
Route::get('/admin/product/{id}', 'Admin\ProductController@show');
Route::get('/admin/product/edit/{id}', 'Admin\ProductController@edit');
Route::patch('/admin/product/edit/{id}', 'Admin\ProductController@update');
Route::delete('/admin/product/delete', 'Admin\ProductController@destroy');

Route::get('/admin/order', 'Admin\OrderController@index');
Route::get('/admin/order/{id}', 'Admin\OrderController@show');
Route::get('/admin/order/edit/{id}', 'Admin\OrderController@edit');
Route::patch('/admin/order/edit/{id}', 'Admin\OrderController@update');
Route::delete('/admin/order/delete', 'Admin\OrderController@destroy');

Route::get('cart', 'ProductController@cart');
Route::post('add-to-cart', 'ProductController@addToCart');
Route::patch('update-cart', 'ProductController@update');
Route::delete('remove-from-cart', 'ProductController@remove');
Route::get('checkout', 'OrderController@create');
Route::post('checkout', 'OrderController@store');
Route::get('/{id}', 'ProductController@show');
