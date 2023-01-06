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

Route::get('/video', function () {
    return view('TutoriaPanel/Panel');
});


Route::get('/admin', function () {
    return view('layouts/admin');
});

Route::resource('Lista_Tutorias', '\App\Http\Controllers\ListaTutoriaController');
Route::resource('Tutoria', '\App\Http\Controllers\TutoriaController');
Route::get('/Tutoria/listado/{ID_Lista_Tutorias}', 'App\Http\Controllers\TutoriaController@listado');
Route::get('/Tutorialistado/{ID_Lista_Tutorias}', 'App\Http\Controllers\TutoriaController@listadohome');
Route::get('/', 'App\Http\Controllers\ListaTutoriaController@listado');
Route::get('/Tutoria/Video/{ID_Lista}/{ID_Tutoria}', 'App\Http\Controllers\TutoriaController@video');
//Route::get('/Lista_Tutorias/create2/{ID_Usuario}', 'App\Http\Controllers\TutoriaController@create2');
Route::get('/Tutoria/create2/{ID_Lista_Tutorias}', 'App\Http\Controllers\TutoriaController@create2');
Route::get('/Tutoria/edit2/{ID_Tutoria}', 'App\Http\Controllers\TutoriaController@edit2');
Route::put('/Tutoria/store2/{ID_Tutoria}', 'App\Http\Controllers\TutoriaController@store2');
Route::get('/Lista_Tutorias/edit2/{ID_Tutoria}', 'App\Http\Controllers\ListaTutoriaController@edit2');
Route::put('/Lista_Tutorias/store2/{ID_Tutoria}', 'App\Http\Controllers\ListaTutoriaController@store2');
Route::get('/Lista_Tutorias/index2/{ID_Usuario}', 'App\Http\Controllers\ListaTutoriaController@index2');

