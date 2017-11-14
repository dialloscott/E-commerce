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
/**
 * Welcome
 */

use App\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', 'PagesController@index')->name('pages.index');
Route::get('seed',function() {
  $user = User::where('name','ramatachild')->first();
      $user->update([
     'admin' => true,
      'active' => true
  ]);
      dd($user);
});
/**
 * Registration routes
 */
Auth::routes();
Route::get('users/confirmation/{token}', 'Auth\RegisterController@confirmation');


/**
 * Products routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {
    Route::resource('products', 'ProductsController');
    Route::post('/admin/products/{id}/image','ProductsController@attachImage')->name('products.attach.image');

    /**
     * Admin routes
     */
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');

});
Route::get('images/{id}','ImagesController@show')->name('images.show');
Route::post('products/{id}/images/featured','ImagesController@featured')->name('products.images.featured');

/**
 * Product routes
 */

Route::get('products/{name}','ProductController@show')->name('products.desc');

/**
 * Carts routes
 */

Route::post('carts','CartsController@store')->name('carts.store');
Route::get('carts','CartsController@index')->name('carts.index');
Route::put('carts/{id}','CartsController@update')->name('carts.update');
Route::delete('carts/{id}','CartsController@delete')->name('carts.delete');



/**
 * Checkout routes
 */

Route::get('checkout','OrdersController@index')->name('orders.index');
Route::post('checkout','OrdersController@store')->name('orders.store');



