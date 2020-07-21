<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register/{user}', 'Auth/RegisterController@showRegistrationForm');
Route::post('/register/{user}', 'Auth/RegisterController@register')->name('register');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
