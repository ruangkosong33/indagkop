<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUs\HeadController;
use App\Http\Controllers\AboutUs\VisionController;
use App\Http\Controllers\AboutUs\QualityController;
use App\Http\Controllers\AboutUs\StructureController;
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

//QUALITY
Route::get('/quality', [QualityController::class, 'index'])->name('quality.index');
Route::get('/quality/create', [QualityController::class, 'create'])->name('quality.create');
Route::post('/quality', [QualityController::class ,'store'])->name('quality.store');
Route::get('/quality/edit/{quality}', [QualityController::class, 'edit'])->name('quality.edit');
Route::put('/quality/{quality}', [QualityController::class, 'update'])->name('quality.update');
Route::delete('/quality/{quality}', [QualityController::class, 'destroy'])->name('quality.destroy');

//HEAD DEPARTEMENT
Route::get('/head', [HeadController::class, 'index'])->name('head.index');
Route::get('/head/create', [HeadController::class, 'create'])->name('head.create');
Route::post('/head', [HeadController::class, 'store'])->name('head.store');
Route::get('/head/edit/{headoffice}', [HeadController::class, 'edit'])->name('head.edit');
Route::put('/head/{headoffice}', [HeadController::class, 'update'])->name('head.update');
Route::delete('/head/{headoffice}', [HeadController::class, 'destroy'])->name('head.destroy');

//STRUCTURE
Route::get('/structure', [StructureController::class, 'index'])->name('structure.index');

