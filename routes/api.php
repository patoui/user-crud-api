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

Route::middleware('auth:api')->get('/users', [
    'as' => 'api.user.index',
    'uses' => 'UserApiController@index'
]);

Route::middleware('auth:api')->post('/users', [
    'as' => 'api.user.store',
    'uses' => 'UserApiController@store'
]);

Route::middleware('auth:api')->get('/users/{user}', [
    'as' => 'api.user.show',
    'uses' => 'UserApiController@show'
]);

Route::middleware('auth:api')->put('/users/{user}', [
    'as' => 'api.user.update',
    'uses' => 'UserApiController@update'
]);

Route::middleware('auth:api')->delete('/users/{user}', [
    'as' => 'api.user.destroy',
    'uses' => 'UserApiController@destroy'
]);
