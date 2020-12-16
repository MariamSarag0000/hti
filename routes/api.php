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

Route::post('/auth/login', 'Student\AuthController@login');

Route::middleware('auth:sanctum')->group(function(){
	Route::get('/auth/me', 'Student\AuthController@me');
	Route::post('/auth/logout', 'Student\AuthController@logout');
	Route::get('/auth/printout', 'Student\AuthController@print');
	Route::get('/auth/requestPage', 'Student\AuthController@requestPage');

});