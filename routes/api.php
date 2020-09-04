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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/meta_trader_opens/{count}', 'ReportController@metaTraderOpens')->name('meta_trader_opens');
// Route::post('/products', 'ProductController@apiAddProducts')->name('api_add_products');
// Route::post('/purchases', 'PurchaseController@apiAddPurchases')->name('api_add_purchases');
// Route::post('/marketers', 'MarketerController@apiCheckMarketer')->name('api_check_marketer');
