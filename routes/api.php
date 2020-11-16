<?php

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


// Auth
Route::group(['prefix' => 'auth', 'namespace' => 'Api\Auth', 'as' => 'auth.'], function () {
    Route::post('register', ['uses' => 'RegisterController', 'as' => 'register']);
    Route::post('login', ['uses' => 'LoginController', 'as' => 'login']);
    Route::post('logout', ['uses' => 'LogoutController', 'as' => 'logout']);
});
