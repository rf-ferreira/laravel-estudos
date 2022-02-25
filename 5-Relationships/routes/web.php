<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HardwareController;

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

Route::get('/', [HardwareController::class, 'index'])->name('index');
Route::post('/', [HardwareController:: class, 'store'])->name('insertHardware');
Route::get('/hardware/{type}', [HardwareController:: class, 'show'])->name('showHardware');