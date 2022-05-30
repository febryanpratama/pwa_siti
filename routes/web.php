<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\SppController;
use App\Http\Controllers\Admin\Tahun_AjaranController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware' => ['role:Admin']], function () {
    Route::get('/', [HomeController::class, 'index']);

    // Siswa
    Route::prefix('/siswa')->group(function(){
        Route::get('/', [SiswaController::class, 'index']);
        Route::get('/form-siswa', [SiswaController::class, 'FormSiswa']);
        Route::post('/', [SiswaController::class,'tambah']);
    });

    // Spp
    Route::prefix('/spp')->group(function(){
        Route::get('/', [SppController::class, 'index']);
    });

    Route::prefix('/tahun-ajaran')->group(function(){
        Route::get('/', [Tahun_AjaranController::class, 'index'])->name('tahunajaran.index');
        Route::post('/', [Tahun_AjaranController::class, 'tambah'])->name('tahunajaran.tambah');
        Route::post('/update', [Tahun_AjaranController::class, 'update'])->name('tahunajaran.update');
        Route::post('/delete', [Tahun_AjaranController::class, 'delete'])->name('tahunajaran.delete');
    });



});



Route::group(['prefix'=>'bendahara','middleware' => ['role:Bendahara']], function () {
    Route::get('/', function(){
        return "Bendahara";
    });
});
Route::group(['prefix'=>'kepsek','middleware' => ['role:Kepsek']], function () {
    Route::get('/', function(){
        return "Kepsek";
    });
});
Route::group(['prefix'=>'user','middleware' => ['role:User']], function () {
    Route::get('/', function(){
        return "User";
    });
});
\PWA::routes();


