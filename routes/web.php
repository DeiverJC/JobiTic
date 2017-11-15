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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('company', 'CompanyInfoController', ['except' => ['destroy']]);
Route::get('get-state-list', 'CompanyInfoController@getStateList');
Route::get('get-city-list', 'CompanyInfoController@getCityList');


