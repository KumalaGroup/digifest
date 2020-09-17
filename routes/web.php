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
Route::get('/back/masuk', 'Admin\Login@index')->name('loginAdmin');

Route::get('/back', 'Admin\Home@index')->name('homeAdmin');

Route::match(['get', 'post'], '/masuk', 'User\Login@index')->name('login');
Route::match(['get', 'post'], '/daftar', 'User\Login@daftar')->name('daftar');

Route::get('/', 'User\Home@index')->name('home');
Route::get('/keluar', 'User\Home@logout')->name('logout');
Route::get('/{brand}', 'User\Home@mainStage')->name('mainStage');
Route::get('/{brand}/rundown', 'User\Home@rundown')->name('rundown');

Route::get('/{brand}/lineUp', 'User\LineUp@index')->name('lineUp');
Route::get('/{brand}/lineUp/{detail}', 'User\LineUp@detail')->name('lineUpDetail');

Route::get('/{brand}/lineUp/{detail}/interiorExterior', 'User\LineUp@interiorExterior')->name('interiorExterior');
Route::get('/{brand}/lineUp/{detail}/testDrive', 'User\LineUp@testDrive')->name('testDrive');
Route::get('/{brand}/lineUp/{detail}/penawaran', 'User\LineUp@penawaran')->name('penawaran');
