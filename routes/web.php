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

Route::get('/masuk', 'Login@index')->name('login');
Route::get('/daftar', 'Login@daftar')->name('daftar');

Route::get('/', 'Home@index')->name('home');
Route::get('/{brand}', 'Home@mainStage')->name('mainStage');
Route::get('/{brand}/rundown', 'Home@rundown')->name('rundown');

Route::get('/{brand}/lineUp', 'LineUp@index')->name('lineUp');
Route::get('/{brand}/lineUp/{detail}', 'LineUp@detail')->name('lineUpDetail');
