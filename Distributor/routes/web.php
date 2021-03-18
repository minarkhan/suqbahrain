<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'DashboardController@login')->name('distributor.login');

Route::group(['middleware'=> 'distributor'], function (){
    Route::get('distributor/dashboard', 'DashboardController@dashboard')->name('distributor.dashboard');
    Route::resource('merchant', 'MerchantController');
    Route::post('changeStatus', 'MerchantController@changeStatus')->name('change.status');
    Route::get('profile', 'ProfileController@edit')->name('profile');
    Route::put('profile_update', 'ProfileController@update')->name('profile.update');
    Route::get('change-password', 'ChangePasswordController@index')->name('password');
    Route::put('change-password', 'ChangePasswordController@store')->name('change.password');
    //bank Info
    Route::resource('bankinfo', 'BankInfoController');
    //amount withdraw
    Route::resource('withdraw', 'WithdrawController');
    //Point convert to BDH
    Route::resource('pointconvert', 'Point_convertController');
});



Auth::routes([
    'register' => false, // Registration Routes...
]);

/*Route::get('/home', 'HomeController@index')->name('home');*/
