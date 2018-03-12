<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api/v1/rehberler', 'APIController@getRehber')->name('rehber.getir');

Route::get('/api/oteller', 'APIController@getOtel')->name('otel.getir');

Route::get('/api/turlar', 'APIController@getTur')->name('tur.getir');

Route::get('/api/v1/alinislar', 'APIController@getAlinis')->name('alinis.getir');

Route::get('/rezervasyonlar', 'APIController@getRezervasyon')->name('rezervasyon.getir');

Route::get('/get-tur-list','APIController@getTurList');


