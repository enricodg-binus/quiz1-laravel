<?php

use Illuminate\Http\Request;

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

Route::get('categories','CategoryController@index');
Route::get('categories/{id}','CategoryController@show');
Route::post('add_category','CategoryController@insert');
Route::delete('delete_category', 'CategoryController@delete');
Route::put('update_category', 'CategoryController@update');

Route::get('items','ItemController@index');
Route::get('items/{id}','ItemController@show');
Route::post('add_item','ItemController@insert');
Route::delete('delete_item', 'ItemController@delete');
Route::put('update_item', 'ItemController@update');
