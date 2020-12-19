<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Password;

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


//login:
Route::post('/auth/login', 'Student\AuthController@login');

Route::middleware('api')->group(function(){
	//change password:
   Route::post('/password/email', 'Student\ForgotPasswordController@forgot');
   Route::post('/password/reset', 'Student\ForgotPasswordController@reset');
});  

Route::middleware('auth:sanctum')->group(function(){
	Route::get('/auth/me', 'Student\AuthController@me');   //profile
	Route::post('/auth/logout', 'Student\AuthController@logout');   //logout
	Route::get('/auth/printout', 'Student\AuthController@print');   //print out

	//Route::get('/auth/requestPage', 'Student\AuthController@requestPage');
	

});

