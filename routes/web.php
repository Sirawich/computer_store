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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UserController')->middleware('role');
Route::resource('promotion','PromotionsController')->middleware('role')->except('show');
Route::get('/promotion/{slug}','PromotionsController@show')->name('promotion.show');
Route::resource('tracking','TrackingController');
