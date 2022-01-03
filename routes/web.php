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


Route::group([ 'namespace' => 'Admin'], function () {
    Route::get('admin/login', 'AdminController@login');
    Route::post('admin/login', 'AdminController@postLogin')->name('admin.login');
});


Route::get('/', 'HomeController@index');
Route::get('product/{id}', 'HomeController@productDetails');
Route::post('createOrder', 'HomeController@createOrder');



Route::group(['namespace' => 'Admin', 'prefix' => 'dashboard', 'middleware' => 'admin'], function () {
  Route::get('/', 'AdminController@index');
  Route::resource('products', 'ProductsController');

  Route::resource('users', 'UsersController');

  Route::resource('orders', 'OrderController');

  Route::resource('productsAdditions', 'ProductsAdditionsController');

  Route::get('logout', ['as' => 'admin.logout', 'uses' => 'AdminController@logout']);

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
