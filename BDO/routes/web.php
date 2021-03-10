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

Route::get('/', 'DashboardController@login')->name('bdo.login');

Route::group(['middleware'=> 'bdo'], function (){
    Route::get('bdo/dashboard', 'DashboardController@dashboard')->name('bdo.dashboard');
    Route::resource('distributor', 'DistributorController');
    Route::post('changeStatus', 'DistributorController@changeStatus')->name('change.status');
    Route::get('profile', 'ProfileController@edit')->name('profile');
    Route::put('profile_update', 'ProfileController@update')->name('profile.update');
    Route::get('change-password', 'ChangePasswordController@index')->name('password');
    Route::put('change-password', 'ChangePasswordController@store')->name('change.password');
});



Auth::routes([
    'register' => false, // Registration Routes...
]);

/*Route::get('/home', 'HomeController@index')->name('home');*/
