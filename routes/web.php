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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'CategoryController@index')->name('categories');

Route::get('category/{slug}', 'CategoryController@showBySlug')->name('category.by-slug');

Route::view('/cart', 'cart')->name('cart');

Route::any('/payment/success', 'PaymentController@success')->name('payment.success');
Route::any('/cancel', 'PaymentController@cancel')->name('payment.cancel');

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

    //products
    Route::get('products', 'Admin\ProductsController@index')->name('admin.products');
    Route::get('products/create', 'Admin\ProductsController@create')->name('admin.product.create');
    Route::get('products/{product}', 'Admin\ProductsController@show')->name('admin.product.show');
    Route::get('products/{product}/edit', 'Admin\ProductsController@edit')->name('admin.product.edit');

    //categories
    Route::get('categories', 'Admin\CategoriesController@index')->name('admin.categories');
    Route::get('categories/create', 'Admin\CategoriesController@create')->name('admin.category.create');
    Route::get('categories/{category}', 'Admin\CategoriesController@show')->name('admin.category.show');
    Route::get('categories/{category}/edit', 'Admin\CategoriesController@edit')->name('admin.category.edit');

    Route::post('temp-image-upload', 'Admin\AdminController@ImageUpload')->name('admin.image-upload');

//    Route::get('user/profile', function () {
//        // Uses first & second Middleware
//    });
});

Route::get('/home', 'HomeController@index')->name('home');

