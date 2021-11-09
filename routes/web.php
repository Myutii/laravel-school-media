<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/sekolah', \App\Http\Controllers\SekolahController::class)->middleware(['auth','checkRole:1']);

Route::resource('kelas', \App\Http\Controllers\KelasController::class)->middleware(['auth','checkRole:1']);
Route::resource('/kelas/posts', KelasController::class)->middleware(['auth','checkRole:1']);

Route::resource('/siswa', \App\Http\Controllers\SiswaController::class)->middleware(['auth','checkRole:1']);
Route::resource('/siswa/posts', SiswaController::class)->middleware(['auth','checkRole:1']);

Route::resource('/kelas_detail', \App\Http\Controllers\KelasDetailController::class)->middleware(['auth','checkRole:2']);

Route::resource('/settings', \App\Http\Controllers\SettingsController::class)->middleware('auth');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
