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

Route::get('/dismap/maps', 'PagesController@index');

Route::get('/dismap/data-tower', 'PagesController@towerIndex');
Route::post('/dismap/data-tower/add', 'DataController@towerStore');
Route::get('/dismap/data-tower/edit/{id}', 'DataController@towerEdit');
Route::post('/dismap/data-tower/edit/{id}', 'DataController@towerUpdate');
Route::get('/dismap/data-tower/view/{id}', 'DataController@towerView');
Route::get('/dismap/data-tower/delete/{id}', 'DataController@towerDestroy');