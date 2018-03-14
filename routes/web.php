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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', 'AdminController@index')->name('admin.index');

    Route::resource('admin/rehber', 'RehberlerController');
    Route::get('admin/rehber/destroy/{id}', 'RehberlerController@destroy');


    Route::resource('admin/otel', 'OtellerController');
    Route::get('admin/otel/destroy/{id}', 'OtellerController@destroy');

    Route::resource('admin/tur', 'TurlarController');
    Route::get('admin/tur/destroy/{id}', 'TurlarController@destroy');

    Route::resource('admin/alinis', 'AlinislarController');
    Route::get('admin/alinis/edit/{id}', 'AlinislarController@edit');
    Route::get('admin/alinis/destroy/{id}', 'AlinislarController@destroy');


    Route::get('/admin/rezervasyon', 'RezervasyonlarController@index')->name('rezervasyon.index');
    Route::get('/panel/rezervasyonlar/filitreli', 'rezervasyonController@indexFilitreli');

    Route::get('/admin/rezervasyon/filitrelitarih', 'RezervasyonlarController@indexTarih');
    Route::get('/admin/rezervasyon/filitreliAd', 'RezervasyonlarController@indexFilitreliAd');
    Route::get('/admin/rezervasyon/yarin', 'RezervasyonlarController@indexYarin');
    Route::get('/admin/rezervasyon/create', 'RezervasyonlarController@ekleForm')->name('rezervasyon.create');
    Route::post('/admin/rezervasyon/create', 'RezervasyonlarController@store');
    Route::get('/admin/rezervasyon/edit/{id}', 'RezervasyonlarController@edit');
    Route::get('/admin/rezervasyon/update/{id}', 'RezervasyonlarController@update');
    Route::get('/admin/rezervasyon/destroy/{id}', 'RezervasyonlarController@destroy');
    Route::get('/admin/rezervasyon/detay/{id}', 'RezervasyonlarController@detay');

    Route::get('admin/transfer', 'TransferlerController@index')->name('transfer.index');
    Route::get('/admin/transfer/create','TransferlerController@create')->name('transfer.create');
    Route::post('/admin/transfer/create','TransferlerController@store');

    // *Route::resource('admin/rezervasyon', 'RezervasyonlarController');
   //** Route::get('admin/rezervasyon/filitreliAd', 'RezervasyonlarController@indexFilitreliAd');
   //** Route::get('admin/rezervasyon/yarin', 'RezervasyonlarController@indexYarin');
   //**  Route::get('admin/rezervasyon/edit/{id}', 'RezervasyonlarController@edit');
  //**  Route::get('admin/rezervasyon/destroy/{id}', 'RezervasyonlarController@destroy');


    Route::resource('admin/carihesap', 'cariHesapController');
    Route::get('admin/carihesap/edit/{id}', 'cariHesapController@edit');
    Route::get('admin/carihesap/destroy/{id}', 'cariHesapController@destroy');


    Route::get('/admin/cariler', 'HomeController@cariler')->name('cariler');

    Route::get('/admin/caridetaylari', 'cariController@index')->name('caridetaylari');
    Route::get('/admin/caridetaylari/filitreli', 'cariController@indexFilitreli');
    Route::get('/admin/caridetaylari/{id}', 'cariController@indexID');
    Route::get('/admin/cari/gonder/{id}', 'cariController@ekleForm');
    Route::post('/admin/cari/gonder/{id}', 'cariController@eklePost');
    //Route::get('/panel/cari/duzenle/{id}', 'cariController@duzenleForm');
    //Route::post('/panel/cari/duzenle/{id}', 'cariController@duzenlePost');
    Route::get('/admin/cari/sil/{id}', 'cariController@sil');
    Route::get('/admin/cari/excel/', 'cariController@excelOut');
    Route::get('/admin/cari/excel/{id}', 'cariController@excelOutID');


    Route::get('/admin/odeme/ekle', 'odemeController@ekleForm')->name('odeme.index');
    Route::post('/admin/odeme/ekle', 'odemeController@eklePost');
    Route::get('/admin/odeme/duzenle/{id}', 'odemeController@duzenleForm');
    Route::post('/admin/odeme/duzenle/{id}', 'odemeController@duzenlePost');

    Route::resource('admin/takvim/events', 'EventsController',['only' => ['index','store']]);

    Route::get('admin/takvim', function () {
        return view('admin.takvim.index');
    })->name('takvim.index');

});