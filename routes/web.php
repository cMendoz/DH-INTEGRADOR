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

Route::get('/welcome', function () {
    return view("welcome");
});

Route::any('/', function () {
    return view("index");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/uploadAvatar', 'AvatarController@store');

Route::post('/addProperty', 'PropertyController@add');

Route::post('/addFavorites', 'PropertyController@favorites');

Route::post('/bookProperty', 'PropertyController@bookings');

Route::post('/changeCountry', 'CountryController@change');

Route::post('/changeLanguage', 'LanguageController@change');

Route::post('/changeCurrency', 'CurrencyController@change');

Route::get('/map', function() {
    return view('map');
});