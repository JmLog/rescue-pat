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

Route::prefix('auth')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\AuthController::class, 'index'])->name('auth.index');
    Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware('admin.auth')->group(function(){
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('index');
});




