<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUs\VisionController;
use App\Http\Controllers\AboutUs\HistoricalController;
use App\Http\Controllers\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');

//VISION
Route::get('/vision', [VisionController::class, 'index'])->name('vision.index');
Route::get('/vision/create', [VisionController::class, 'create'])->name('vision.create');
Route::post('/vision', [VisionController::class, 'store'])->name('vision.store');
Route::get('/vision/edit/{vision}', [VisionController::class, 'edit'])->name('vision.edit');
Route::put('/vision/{vision}', [VisionController::class, 'update'])->name('vision.update');
Route::delete('/vision/{vision}', [VisionController::class, 'destroy'])->name('vision.destroy');

//HISTORICAL
Route::get('/historical', [HistoricalController::class, 'index'])->name('historical.index');
Route::get('/historical/create', [HistoricalController::class, 'create'])->name('historical.create');
Route::post('/historical', [HistoricalController::class, 'store'])->name('historical.store');
Route::get('/historical/edit/{historical}', [HistoricalController::class, 'edit'])->name('historical.edit');
Route::put('/historical/{historical}', [HistoricalController::class, 'update'])->name('historical.update');
Route::delete('/historical/{historical}', [HistoricalController::class, 'destroy'])->name('historical.destroy');

//Keb

