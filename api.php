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

//Route::get('/whois/{domain?}','App\Http\Controllers\WhoisController@getWhois');
Route::get('whois/{domain?}','App\Http\Controllers\WhoisController@getWhois', function ($domain = null) {
    return $domain;
});
Route::get('/renameWhois/{domain}/{alias}','App\Http\Controllers\WhoisController@renameWhois');
/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */
