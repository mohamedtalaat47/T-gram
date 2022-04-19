<?php

use App\Mail\newUserWelcomeMail;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/email', function(){

    return new newUserWelcomeMail();

});

Auth::routes();

// profile routes
Route::get('/profile/{user}', 'App\Http\Controllers\profileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'App\Http\Controllers\profileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'App\Http\Controllers\profileController@update')->name('profile.update');

// posts routes
Route::get('/p/create', 'App\Http\Controllers\postController@Create');
Route::get('/p/{post}', 'App\Http\Controllers\postController@show');
Route::post('/p', 'App\Http\Controllers\postController@store');
Route::get('/', 'App\Http\Controllers\postController@index');

//follow routes
Route::post('/follow/{user}','App\Http\Controllers\followController@store');



