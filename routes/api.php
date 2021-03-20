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

Route::group(['namespace'=>'Api'],function (){
    Route::post('login','UserController@login');
    Route::post('register','UserController@register');
    Route::post('getprofile','UserController@getprofile');
    Route::post('forgotPassword','UserController@forgotPassword');
    Route::post('version_code','UserController@androidversion');

    Route::get('category','CategoryController@category');

    Route::post('item','ItemController@item');
    Route::post('itemdetails','ItemController@itemdetails');
    Route::post('searchitem','ItemController@searchitem');
    
});