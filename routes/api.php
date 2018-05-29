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

// Ideally you'd want `middleware('auth:api')->` with Laravel Passport
// for the sake of simplicity is has been omitted
Route::get('/users', [
    'as' => 'api.user.index',
    'uses' => 'UserApiController@index'
]);

Route::post('/users', [
    'as' => 'api.user.store',
    'uses' => 'UserApiController@store'
]);

Route::get('/users/{user}', [
    'as' => 'api.user.show',
    'uses' => 'UserApiController@show'
]);

Route::put('/users/{user}', [
    'as' => 'api.user.update',
    'uses' => 'UserApiController@update'
]);

Route::delete('/users/{user}', [
    'as' => 'api.user.destroy',
    'uses' => 'UserApiController@destroy'
]);
