<?php

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
    Route::get('/', function(){
        return "admin";
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

