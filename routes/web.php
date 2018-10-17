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

Route::get('/', "ProductsController@index")->name('index');
Route::get('/products', function () {  return view('products');  })->name('products');
Route::get('/shop', "CategoriesControllers@index")->name('shop');


Route::get('/categories/{id}', "CategoriesControllers@show")->name('categories.show');
Route::get('/products/{id}', "CategoriesControllers@showMore")->name('categories.showMore');
Route::get('/details/{id}', "ProductsController@show")->name('products.show');
Route::get('result/fetch', 'ProductsController@fetch')->name('products.fetch');

Route::get('/addtocart/{id}', "ProductsController@add")->name('cart.add');
Route::get('/cart', "ProductsController@cart")->name('cart');
Route::get('/unsetSession/{id}', "ProductsController@unsetSession")->name('session.unset');


Route::get('/liveSearch', "ProductsController@liveSearch")->name('live.search');
Route::get('/sorting', "ProductsController@sorting")->name('product.sorting');
Route::get('/ordering', "ProductsController@ordering")->name('product.ordering');
Route::get('/finalOrder', "ProductsController@finalOrder")->name('product.finalOrder');
