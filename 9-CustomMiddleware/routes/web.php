<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ViewController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/admin', [ViewController::class, 'viewAdmin'])->name('admin.index')->middleware('role:admin');
    Route::get('/moderator', [ViewController::class, 'viewModerator'])->name('moderator.index')->middleware(('role:moderator'));
});
