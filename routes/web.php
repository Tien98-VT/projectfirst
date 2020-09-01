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

// Route::get('/', function () {
//     return view('welcome');
// });
// Fontend

use Illuminate\Auth\Events\Login;
use Illuminate\Routing\RouteGroup;

Route::group(['prefix' => '/','namespace'=>'frontend'], function() {
    Route::get('/','FontendController@index')->name('frontend.index');
    // about
Route::get('/about','FontendController@about')->name('about');
// contact
Route::get('/contact','FontendController@contact')->name('contact');

Route::group(['prefix' => 'product', 'namespace'=>'Product'], function () {
    Route::get('/shop', 'ProductController@shop')->name('product.shop');
    Route::get('/{slug_product}.html', 'ProductController@detail')->name('product.detail');
    Route::get('/filter', 'ProductController@filter')->name('product.filter');
});


Route::group(['prefix' => 'cart','namespace'=>'cart'], function() {
        Route::get('/', 'CartController@cart')->name('cart');
        Route::get('/addcart', 'CartController@addToCart')->name('cart.add');
        Route::get('/quickadd/{id_product}', 'CartController@addToCart')->name('cart.quick');
        Route::get('/update', 'CartController@updateCart')->name('cart.update');
        Route::get('/delete/{rowId}', 'CartController@delete')->name('cart.delete');
        Route::get('/checkout', 'CartController@checkout')->name('checkout');
        Route::post('/checkout', 'CartController@paid')->name('cart.paid');
        Route::get('/complete', 'CartController@complete')->name('complete');
    });

});






// backend
// login
Route::get('backend/login','Backend\Auth\LoginController@login')->name('Login')->middleware('checkLogout');
Route::post('backend/login','Backend\Auth\LoginController@postlogin');


// admin
Route::group(['prefix' => 'admin', 'namespace'=>'Backend', 'middleware'=>'checkLogin'], function() {
    Route::get('/','Backendcontroller@index')->name('admin.index');
    Route::get('/logout','Backendcontroller@logout')->name('logout');

// excel

Route::group(['prefix' => '/','namespace'=>'excel'], function() {
    Route::get('/export', 'ExcelController@export')->name('export');
    Route::post('/import', 'ExcelController@import')->name('import');
});



// category

Route::group(['prefix' => 'category','namespace'=>'Category'], function () {
    Route::get('/', 'CategoryController@category')->name('category.index');
    Route::post('/store', 'CategoryController@store')->name('category.store');
    Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('delete/{id}', 'CategoryController@delete')->name('category.delete');
});


// product

Route::group(['prefix' => 'product', 'namespace'=>'Product'], function () {
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('create', 'ProductController@create')->name('product.create');
    Route::post('store', 'ProductController@store')->name('product.store');
    Route::get('edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::get('delete/{id}', 'ProductController@delete')->name('product.delete');
});


// user

Route::group(['prefix' => 'user','namespace'=>'User'], function () {
    Route::get('/', 'UserController@index')->name('user');
    Route::get('create', 'UserController@create')->name('user.create');
    Route::post('store', 'UserController@store')->name('user.store');
    Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
    Route::get('delete/{id}', 'UserController@delete')->name('user.delete');
});


// orders

Route::group(['prefix' => 'orders','namespace'=>'Order'], function() {
    Route::get('/','OrderController@orders')->name('orders');
    Route::get('/detail/{order_id}', 'OrderController@ordersdetail')->name('orders.detail');
    Route::get('/approve/{order_id}', 'OrderController@approve')->name('orders.approve');
    Route::get('/process', 'OrderController@process')->name('orders.process');
});


});
