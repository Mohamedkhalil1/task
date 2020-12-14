<?php

use App\Exports\EventOrders;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Maatwebsite\Excel\Facades\Excel;
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

#define('PAGINATION_COUNT',5);


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

        
    Route::group(['namespace' =>'Admin','prefix' =>'admin'], function () {
        Route::get('/login','LoginController@getLogin')->name('get.admin.login');
        Route::post('/login','LoginController@Login')->name('admin.login');
        Route::get('/logout','LoginController@Logout')->name('admin.logout');
    });


    Route::group(['namespace' =>'Admin',/*'middleware' => 'auth:admin',*/'prefix' =>'admin'], function () {
            Route::get('/', 'DashboardController@index')->name('admin.dashboard');

             #################### Products Routes ####################
             Route::group(['namespace' =>'Products','prefix' => 'products'], function () {
                Route::get('/','ProductController@index')->name('admin.products');
                Route::get('/inventory','ProductController@inventory')->name('admin.products.inventory');
                Route::get('/create','ProductController@create')->name('admin.products.create');
                Route::post('/image','ProductController@saveProductImage')->name('admin.products.images.store');
                Route::post('/','ProductController@store')->name('admin.products.store');
                Route::put('/{variant_id}','ProductController@variant_update')->name('admin.products.variant.update');
                Route::get('/edit/{id}','ProductController@edit')->name('admin.products.edit');
                Route::get('variant','ProductController@store_variant')->name('admin.products.store.variant');
                Route::get('variant/show/{product_id}','ProductController@showVariants')->name('admin.products.show.variants');
                Route::post('store/variant','ProductController@store_variant')->name('admin.products.store.variant');
                Route::get('remove/variant/{product_id}/{variant_id}','ProductController@remove_variant')->name('admin.products.variant.remove');
                
            });
            #################### End Produts Routes ####################

            #################### Users Routes ####################
            Route::group(['namespace' =>'User','prefix' => 'profile'], function () {
                Route::get('/','UserController@edit')->name('admin.user.edit');
                Route::put('/','UserController@update')->name('admin.user.update');
            });
            #################### End Users Routes ####################
        });
        
});


