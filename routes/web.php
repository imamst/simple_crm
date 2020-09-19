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
})->middleware(['guest', 'guest:agent']);

Route::get('login', 'Auth\LoginController@showLoginForm');
// Route::get('login/agent', 'Auth\AgentLoginController@showLoginForm');
Route::post('login/agent', 'Auth\AgentLoginController@login')->name('login.agent');

Auth::routes(['register' => false]);
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::prefix('tenants')->group(function () {
    Route::get('/{token}/edit', 'TenantController@edit')->name('tenants.edit');
    Route::patch('/{tenant}', 'TenantController@update')->name('tenants.update');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', 'LandlordHomeController')->name('home');

    Route::get('/profile/{landlord}', 'LandlordProfileController@show')->name('profile');
    Route::get('/profile/{landlord}/edit', 'LandlordProfileController@edit')->name('profile.edit');
    Route::patch('/profile/{landlord}', 'LandlordProfileController@update')->name('profile.update');
    
    Route::resource('agents', 'AgentController');
    Route::get('agents/{agent}/contracts', 'AgentContractsController')->name('agents.contracts.index');
    
    Route::prefix('tenants')->group(function () {
        Route::get('/', 'TenantController@index')->name('tenants.index');
        Route::get('/{tenant}', 'TenantController@show')->name('tenants.show');
        Route::get('/{tenant}/request', 'TenantController@sendRequest')->name('tenants.request');
    });
});

Route::middleware(['auth:agent'])->group(function(){
    Route::get('/dashboard/agent', 'AgentHomeController')->name('home.agent');
    
    Route::get('/profile/agent/{agent}', 'AgentProfileController@show')->name('profile.agent');
    Route::get('/profile/agent/{agent}/edit', 'AgentProfileController@edit')->name('profile.agent.edit');
    Route::patch('/profile/agent/{agent}', 'AgentProfileController@update')->name('profile.agent.update');
    
    Route::resource('contracts', 'ContractController');
});