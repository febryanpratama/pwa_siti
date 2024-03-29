<?php

use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\SppController;
use App\Http\Controllers\KelasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('data-siswa', [KelasController::class, 'apiKelas']);
Route::post('data-spp', [SppController::class, 'apiSpp']);

Route::post('dashboard', [SppController::class, 'apiDashboard']);

Route::get('get-semester', [SppController::class, 'getSemester']);
// Route::post('data-siswa', [KelasController::class, 'apiSiswa']);
