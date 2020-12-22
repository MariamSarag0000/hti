<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
Route::get('/registrationCard', function (){
    auth()->loginUsingId(1);
        $studentMaterial=\App\Student::Where('id',auth()->students()->id)->with('material')->get();
        dd($studentMaterial->toArray());
        echo 'hi';
}
*/