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
    // return view('test');
});

Route::get('products', ["uses" => "ProductsController@index", "as"=> "allProducts"]);
Route::get('product/addToCart/{id}',['uses'=>'ProductsController@addProductToCart', 'as'=>'AddToCartProduct']);

//shows cart items
Route::get('cart', ["uses" => "ProductsController@showCart", "as"=> "cartProducts"]);

//delete items from the cart
Route::get('product/deleteItemFromCart/{id}', ["uses" => "ProductsController@deleteItemFromCart", "as"=> "deleteItemFromCart"]);

//Route::get('/clear-cache', function() {
//    Artisan::call('cache:clear');
//    return "Cache is cleared";
//});
