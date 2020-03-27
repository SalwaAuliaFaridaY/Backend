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

//tambahkan ini
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::middleware(['jwt.verify'])->group(function(){
    Route::get('/jual', 'JualController@index');
    Route::get('/jual/{id}', 'JualController@show');
    Route::post('/jual', 'JualController@store');
    Route::put('/jual/{id}', 'JualController@update');
    Route::delete('/jual/{id}', 'JualController@destroy');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
