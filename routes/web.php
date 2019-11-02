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

// Route::get('/', function ()
// {
//     // return view('welcome');  //default welcome page
//     // return view('test');
// });
Route::get('/', ["uses" => "ProductsController@index", "as"=> "homePage"]);

//-----filters-------
//show all products
Route::get('products', ["uses" => "ProductsController@index", "as"=> "allProducts"]);

//category for men
Route::get('products/swimwears', ["uses" => "ProductsController@swimwearProducts", "as"=> "swimwearProducts"]);

//category for women
Route::get('products/coverUps', ["uses" => "ProductsController@coverUpProducts", "as"=> "coverUpProducts"]);

//category for accessories
Route::get('products/accessories', ["uses" => "ProductsController@accessoryProducts", "as"=> "accessoryProducts"]);
//--------end of filter-------

//search
Route::get('search', ["uses" => "ProductsController@search", "as"=> "searchProducts"]);


//add to cart products
Route::get('product/addToCart/{id}',['uses'=>'ProductsController@addProductToCart', 'as'=>'AddToCartProduct']);

//shows cart items
Route::get('cart', ["uses" => "ProductsController@showCart", "as"=> "cartProducts"]);

//delete items from the cart
Route::get('product/deleteItemFromCart/{id}', ["uses" => "ProductsController@deleteItemFromCart", "as"=> "deleteItemFromCart"]);

//user authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//**** ADMIN ****

//admin panel
Route::get('admin/products', ["uses"=>"Admin\AdminProductsController@index", "as"=> "adminDisplayProducts"])->Middleware('restrictToAdmin');

//display edit product form
Route::get('admin/editProductForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductForm", "as"=> "adminEditProductForm"]);

//display edit product image form
Route::get('admin/editProductImageForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductImageForm", "as"=> "adminEditProductImageForm"]);

//update product image
Route::post('admin/updateProductImage/{id}', ["uses"=>"Admin\AdminProductsController@updateProductImage", "as"=> "adminUpdateProductImage"]);

//update product existing data
Route::post('admin/updateProduct/{id}', ["uses"=>"Admin\AdminProductsController@updateProduct", "as"=> "adminUpdateProduct"]);

//display create product form
Route::get('admin/createProductForm', ["uses"=>"Admin\AdminProductsController@createProductForm", "as"=> "adminCreateProductForm"]);

//send new product data to database
Route::post('admin/sendCreateProductForm', ["uses"=>"Admin\AdminProductsController@sendCreateProductForm", "as"=> "adminSendCreateProductForm"]);

//delete/remove product
Route::get('admin/deleteProduct/{id}', ["uses"=>"Admin\AdminProductsController@deleteProductForm", "as"=> "adminDeleteProduct"]); // always pass ID so we know what product to be executed : CRUD

//increase single product in cart
Route::get('product/increaseSingleProduct/{id}', ["uses"=>"ProductsController@increaseSingleProduct", "as"=> "IncreaseSingleProduct"]); // always pass ID so we know what product to be executed : CRUD

//decrease single product in cart
Route::get('product/decreaseSingleProduct/{id}', ["uses"=>"ProductsCOntroller@decreaseSingleProduct", "as"=> "DecreaseSingleProduct"]); // always pass ID so we know what product to be executed : CRUD


// *** CHEACK OUT

//create an order
Route::get('product/createOrder/',['uses'=>'ProductsController@createOrder','as'=>'createOrder']);

//check out products
Route::get('product/checkOutProducts/',['uses'=>'ProductsController@checkOutProducts','as'=>'checkOutProducts']);

//process checkout page
Route::post('product/createNewOrder/',['uses'=>'ProductsController@createNewOrder','as'=>'createNewOrder']);

//storage

Route::get('/testStorage', function()
    {
        // return "<img src=".Storage::url('product_images/jacket.jpg').">";    // when using the ::url function you dont have to specify the whole path. just the single folder where the file is. it knows the image is inside the public directory
        // return Storage::disk('local')->url('product_images/jacket.jpg');     // when using class Storage with the function of ::disk, it also knows the file is inside the public directory but no <img> tag, not an image just the url
        // print_r(Storage::disk("local")->exists("public/product_images/jacket.jpg"));     //exists method, need to specify the complete file path/url because it doesnt know where the file exactly sitting in. checks if the file exists or not. boolean
        // Storage::delete('public/product_images/jacket.jpg');                 //delete, deletes the file. like exists method, you have to specify the complete path/url. remember that the storage folder thats inside the public folder is originally copied link from the storage/app/public/product_images
    });

//Route::get('admin/products', ["uses"=>"Admin\AdminProductsController@index", "as"=> "adminDisplayProducts"])->middleware('restrictToAdmin');

















//Route::get('/clear-cache', function() {
//    Artisan::call('cache:clear');
//    return "Cache is cleared";
//});
