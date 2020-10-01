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

//Route Admin
Route::match(['get', 'post'], '/masuk', 'User\Login@index')->name('login');
Route::match(['get', 'post'], '/daftar', 'User\Login@daftar')->name('daftar');

Route::get('/', 'User\Home@index')->name('home');
Route::match(['get', 'post'], '/profil', 'User\Home@profil')->name('profil');
Route::get('/keluar', 'User\Home@logout')->name('logout');

Route::get('/{brand}', 'User\LineUp@index')->name('lineUp');
Route::get('/{brand}/{detail}', 'User\LineUp@detail')->name('lineUpDetail');

Route::get('/{brand}/{detail}/interiorExterior', 'User\LineUp@interiorExterior')->name('interiorExterior');
Route::get('/{brand}/{detail}/testDrive', 'User\LineUp@testDrive')->name('testDrive');
Route::get('/{brand}/{detail}/penawaran', 'User\LineUp@penawaran')->name('penawaran');
