<?php

use App\Http\Controllers\User\Home;
use App\Http\Controllers\User\LineUp;
use App\Http\Controllers\User\Login;
use App\Http\Controllers\User\Transaksi;
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
Route::match(['get', 'post'], '/masuk', [Login::class, 'index'])->name('login');
Route::match(['get', 'post'], '/daftar', [Login::class, 'daftar'])->name('daftar');

Route::get('/', [Home::class, 'index'])->name('home');
Route::match(['get', 'post'], '/profil', [Home::class, 'profil'])->name('profil');
Route::match(['get', 'post'], '/transaksi', [Transaksi::class, 'index'])->name('transaksi');
Route::match(['get', 'post'], '/transaksi/checkout', [Transaksi::class, 'create'])->name('transaksiCheckout');
Route::get('/keluar', [Home::class, 'logout'])->name('logout');

Route::get('/{brand}', [LineUp::class, 'index'])->name('lineUp');
Route::match(['get', 'post'], '/{brand}/{detail}', [LineUp::class, 'detail'])->name('lineUpDetail');

Route::get('/{brand}/{detail}/interiorExterior', [LineUp::class, 'interiorExterior'])->name('interiorExterior');
Route::get('/{brand}/{detail}/testDrive', [LineUp::class, 'testDrive'])->name('testDrive');
Route::get('/{brand}/{detail}/penawaran', [LineUp::class, 'penawaran'])->name('penawaran');
