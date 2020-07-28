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
    return redirect('login');
});

Route::get('login', 'Auth\LoginController@showLoginForm');

Auth::routes(['register' => false, 'verify' => true]);

Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::middleware(['auth','verified'])->group(function(){

    Route::resource('contracts', 'ContractController', ['except' => ['show']])->middleware(['agent']);

    Route::prefix('tenants')->group(function () {
        Route::get('/{token}/edit', 'TenantController@edit')->name('tenants.edit');
        Route::middleware(['landlord'])->group(function(){
            Route::get('/', 'TenantController@index')->name('tenants.index');
            Route::get('/{tenant}', 'TenantController@show')->name('tenants.show');
            Route::patch('/{tenant}/reset', 'TenantController@reset')->name('tenants.reset');
            Route::get('/{tenant}/request', 'TenantController@sendRequest')->name('tenants.request');
        });
        Route::patch('/{tenant}', 'TenantController@update')->name('tenants.update');
    });

    Route::get('dashboard', 'HomeController@index')->name('home');

});