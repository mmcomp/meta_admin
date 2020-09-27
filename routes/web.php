<?php

use GuzzleHttp\Psr7\Request;
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

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@login')->name('dologin');
// Route::get('/register', 'RegisterController@index')->name('register');
// Route::post('/register', 'RegisterController@sendsms')->name('sendsms');
// Route::post('/register/checksms', 'RegisterController@checksms')->name('checksms');
// Route::post('/register/createuser', 'RegisterController@createuser')->name('createuser');
Route::group(['middleware' => ['auth', 'message']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard_admin');

    Route::group(['prefix' => '/charges'], function () {
        Route::get('/', 'ChargeController@index')->name('charges');
        Route::any('/create', 'ChargeController@create')->name('charge_create');
        Route::any('/edit/{id}', 'ChargeController@edit')->name('charge_edit');
        Route::get('/delete/{id}', 'ChargeController@delete')->name('charge_delete');
    });

    Route::group(['prefix' => '/reports'], function () {
        Route::get('/', 'ReportController@index')->name('reports');
        Route::any('/create', 'ReportController@create')->name('report_create');
        Route::any('/edit/{id}', 'ReportController@edit')->name('report_edit');
        Route::get('/delete/{id}', 'ReportController@delete')->name('report_delete');
    });

    Route::group(['prefix' => '/settings'], function () {
        Route::any('/', 'SettingController@edit')->name('settings');
    });
});

