<?php

use App\Http\Controllers\Admin\AdminControlller;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ManajemenUserController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\SppController;
use App\Http\Controllers\Admin\Tahun_AjaranController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
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
    return redirect('/login');
});


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Admin']], function () {

    Route::get('/dashboard', [AdminControlller::class, 'index']);
    // Siswa
    Route::prefix('/siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index']);
        Route::get('/form-siswa', [SiswaController::class, 'FormSiswa']);
        Route::get('/form-edit/{siswa_id}', [SiswaController::class, 'FormEdit'])->name('FormEdit');
        Route::post('/', [SiswaController::class, 'tambah']);
        Route::post('/update', [SiswaController::class, 'update'])->name('FormSiswa.update');
        Route::post('/delete', [SiswaController::class, 'delete'])->name('Formsiswa.delete');
    });

    // Spp
    Route::group([
        'prefix' => 'spp'
    ], function () {
        Route::get('/', [SppController::class, 'index']);
        Route::get('/kelas/{kelas_id}', [SppController::class, 'detailKelas']);
        Route::get('/kelas/{kelas_id}/siswa/{siswa_id}', [SppController::class, 'detailSiswa']);
        Route::get('generate/{kelas_id}', [SppController::class, 'generate']);
        Route::post('/', [SppController::class, 'store']);
    });

    Route::prefix('/tahun-ajaran')->group(function () {
        Route::get('/', [Tahun_AjaranController::class, 'index'])->name('tahunajaran.index');
        Route::post('/', [Tahun_AjaranController::class, 'tambah'])->name('tahunajaran.tambah');
        Route::post('/update', [Tahun_AjaranController::class, 'update'])->name('tahunajaran.update');
        Route::post('/delete', [Tahun_AjaranController::class, 'delete'])->name('tahunajaran.delete');
    });

    Route::group([
        'prefix' => 'guru',
    ], function () {
        Route::get('/', [GuruController::class, 'index']);
        Route::post('/', [GuruController::class, 'store']);
    });


    Route::group([
        'prefix' => 'kelas',
    ], function () {
        Route::get('/', [KelasController::class, 'index']);
        Route::get('/{kelas_id}/detail', [KelasController::class, 'detail']);
        Route::post('/', [KelasController::class, 'store']);
        Route::post('/update', [KelasController::class, 'update']);
        Route::post('/destroy', [KelasController::class, 'destroy']);
        Route::post('siswa-store', [KelasController::class, 'siswaStore']);
    });
    // manajemen user
    Route::prefix('/manajemen_siswa')->group(function () {
        Route::get('/', [ManajemenUserController::class, 'index'])->name('manajemen_siswa.index');
    });

    // manajemen Bendahara
    Route::group([
        'prefix' => 'bendahara',
    ], function () {
        Route::get('/', [BendaharaController::class, 'index']);
        Route::post('/', [BendaharaController::class, 'store']);
        Route::post('/update', [BendaharaController::class, 'update']);
    });

    // manajemen Kepala Sekolah
    Route::prefix('/manajemen_kepala_sekolah')->group(function () {
        Route::get('/', [ManajemenUserController::class, 'index_kepala_sekolah'])->name('manajemen_kepala_sekolah.index');
    });
});



Route::group(['prefix' => 'bendahara', 'middleware' => ['role:Bendahara']], function () {
    //
    Route::get('/', [BendaharaController::class, 'singleIndex']);

    Route::group([
        'prefix' => 'spp',
    ], function () {
        Route::get('/', [SppController::class, 'index']);
        Route::post('/', [SppController::class, 'store']);
        Route::post('/update', [SppController::class, 'update']);
        Route::post('/delete', [SppController::class, 'delete']);
    });

    Route::group([
        'prefix' => 'laporan-spp'
    ], function () {
        Route::get('/', [\App\Http\Controllers\LaporanController::class, 'index']);
    });
    //
});
Route::group(['prefix' => 'kepsek', 'middleware' => ['role:Kepsek']], function () {
    Route::get('/', function () {
        return "Kepsek";
    });
});
Route::group(['prefix' => 'user', 'middleware' => ['role:User']], function () {
    Route::get('/', function () {
        return "User";
    });
});

\PWA::routes();
