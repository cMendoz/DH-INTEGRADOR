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
    $css = "style_modo_claro.css";
    $carpeta = "img";
    $foto = $carpeta."/user.png";

    return view('pages.inicio.index', compact('css', 'carpeta', 'foto'));
});
