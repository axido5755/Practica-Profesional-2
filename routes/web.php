<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/Referidos', function () {
    return view('Referidos');
});

Route::get('/Login', function () {
    return view('Login');
});


Route::get('/admin', function () {
    return view('layouts/admin');
});

Route::resource('Lista_Tutorias', '\App\Http\Controllers\ListaTutoriaController');
Route::resource('Tutoria', '\App\Http\Controllers\TutoriaController');
Route::get('/Tutoria/listado/{ID_Lista_Tutorias}', 'App\Http\Controllers\TutoriaController@listado');
Route::get('/', 'App\Http\Controllers\ListaTutoriaController@listado');