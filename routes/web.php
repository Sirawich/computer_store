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
Route::get('/home/search', 'HomeController@search')->name('home.search');
Route::get('/home/tracking', 'HomeController@tracking')->name('home.tracking');
Route::resource('user','UserController')->middleware('role');
Route::resource('promotion','PromotionsController')->middleware('role')->except('show');
Route::get('/promotion/{promotion}','PromotionsController@show')->name('promotion.show');
Route::resource('tracking','TrackingController')->middleware('role')->except('show');
Route::get('/tracking/{slug}','TrackingController@show')->name('tracking.show');

