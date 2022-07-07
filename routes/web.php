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
    $vista="home";
    return view('home.index')->with("vista",$vista);
});

Route::get('categories', function () {
    $vista="categories";
    return view('home.index')->with("vista",$vista);
});

Route::get('products', function () {
    $vista="products";
    return view('home.index')->with("vista",$vista);
});

Route::get('sales/mensaje', 'App\Http\Controllers\SalesController@mensaje');
Route::get('sales/', 'App\Http\Controllers\SalesController@index');
Route::match(['get', 'post'], 'sales/store','App\Http\Controllers\SalesController@store');
Route::get('sales/show/{id}','App\Http\Controllers\SalesController@show');
Route::match(['get', 'post'],'sales/list','App\Http\Controllers\SalesController@listOrders');

Route::match(['get', 'post'], 'categories/store','App\Http\Controllers\CategoriesController@store');
Route::match(['get', 'post'], 'categories/update','App\Http\Controllers\CategoriesController@update');
Route::match(['get', 'post'], 'categories/delete','App\Http\Controllers\CategoriesController@delete');

Route::match(['get', 'post'], 'products/store','App\Http\Controllers\ProductsController@store');
Route::match(['get', 'post'], 'products/update','App\Http\Controllers\ProductsController@update');
Route::match(['get', 'post'], 'products/delete','App\Http\Controllers\ProductsController@delete');
Route::match(['get', 'post'], 'products/autocomplete','App\Http\Controllers\ProductsController@autocomplete');
