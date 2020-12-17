<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('options','Admin\Products\ProductController@get_option');



Route::get('products','Admin\Products\ProductController@products');



Route::get('products/{product_id}','Admin\Products\ProductController@get_product');


Route::get('products/options/{product_id}','Admin\Products\ProductController@get_product_options');
