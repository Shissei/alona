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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', 'AlonaController@getForm');
Route::post('/store', 'AlonaController@storeGuest');
Route::get('/print', 'AlonaController@getGuestPrint');
Route::post('/print', 'AlonaController@getGuestPrint');
Route::get('/pdf', [
    'as' => 'pdf',
    'uses' => 'AlonaController@getGuestPrint'
]);

Auth::routes();

Route::get('/find', 'AlonaController@find');
Route::post('/show', 'AlonaController@getGuest');
Route::get('/list', 'AlonaController@getList')->name('list');
Route::post('/list/', 'AlonaController@getList');
Route::get('/guest', 'AlonaController@getPrint')->name('guest');
Route::get('/guest_pdf', [
    'as' => 'guest_pdf',
    'uses' => 'AlonaController@getPrint'
]);
Route::get('/edit', 'AlonaController@edit')->name('edit');
Route::put('/update', 'AlonaController@update');
Route::get('/revisions', 'AlonaController@revisions');