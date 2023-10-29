<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutUs\TaskController;
use App\Http\Controllers\Activity\IkuController;
use App\Http\Controllers\ACtivity\SopController;
use App\Http\Controllers\AboutUs\LhkpnController;
use App\Http\Controllers\AboutUs\LeaderController;
use App\Http\Controllers\AboutUs\PolicyController;
use App\Http\Controllers\AboutUs\VisionController;
use App\Http\Controllers\AboutUs\QualityController;
use App\Http\Controllers\Activity\NeracaController;
use App\Http\Controllers\Activity\RenstraController;
use App\Http\Controllers\AboutUs\StructureController;
use App\Http\Controllers\AboutUs\HistoricalController;
use App\Http\Controllers\Activity\EvaluationController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Organization\DivisionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make a something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//logout
Route::get('logout', function()
{
    Auth::logout();
});

//MIDDLEWARE
Route::group(['middleware'=>['auth', 'role:admin']], function()
{
    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //CATEGORY
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    //POST
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    //VISION
    Route::get('/vision', [VisionController::class, 'index'])->name('vision.index');
    Route::get('/vision/create', [VisionController::class, 'create'])->name('vision.create');
    Route::post('/vision', [VisionController::class, 'store'])->name('vision.store');
    Route::get('/vision/edit/{vision}', [VisionController::class, 'edit'])->name('vision.edit');
    Route::put('/vision/{vision}', [VisionController::class, 'update'])->name('vision.update');
    Route::delete('/vision/{vision}', [VisionController::class, 'destroy'])->name('vision.destroy');

    //DIVISION
    Route::get('/division', [DivisionController::class, 'index'])->name('division.index');
    Route::get('/division/create', [DivisionController::class, 'create'])->name('division.create');
    Route::post('/division', [DivisionController::class, 'store'])->name('division.store');
    Route::get('/division/edit/{division}', [DivisionController::class, 'edit'])->name('division.edit');
    Route::put('/division/{division}', [DivisionController::class, 'update'])->name('division.update');
    Route::delete('/division/{division}', [DivisionController::class, 'destroy'])->name('division.destroy');

    //HISTORICAL
    Route::get('/historical', [HistoricalController::class, 'index'])->name('historical.index');
    Route::get('/historical/create', [HistoricalController::class, 'create'])->name('historical.create');
    Route::post('/historical', [HistoricalController::class, 'store'])->name('historical.store');
    Route::get('/historical/edit/{historical}', [HistoricalController::class, 'edit'])->name('historical.edit');
    Route::put('/historical/{historical}', [HistoricalController::class, 'update'])->name('historical.update');
    Route::delete('/historical/{historical}', [HistoricalController::class, 'destroy'])->name('historical.destroy');

    //BANNER
    Route::get('/lhkpn', [LhkpnController::class, 'index'])->name('lhkpn.index');
    Route::get('/lhkpn/create', [LhkpnController::class, 'create'])->name('lhkpn.create');
    Route::post('/lhkpn', [LhkpnController::class, 'store'])->name('lhkpn.store');
    Route::get('/lhkpn/edit/{lhkpn}', [LhkpnController::class, 'edit'])->name('lhkpn.edit');
    Route::put('/lhkpn/{lhkpn}', [LhkpnController::class, 'update'])->name('lhkpn.update');
    Route::delete('/lhkpn/{lhkpn}', [LhkpnController::class, 'destroy'])->name('lhkpn.destroy');

    //QUALITY
    Route::get('/quality', [QualityController::class, 'index'])->name('quality.index');
    Route::get('/quality/create', [QualityController::class, 'create'])->name('quality.create');
    Route::post('/quality', [QualityController::class ,'store'])->name('quality.store');
    Route::get('/quality/edit/{quality}', [QualityController::class, 'edit'])->name('quality.edit');
    Route::put('/quality/{quality}', [QualityController::class, 'update'])->name('quality.update');
    Route::delete('/quality/{quality}', [QualityController::class, 'destroy'])->name('quality.destroy');

    //STRUCTURE
    Route::get('/structure', [StructureController::class, 'index'])->name('structure.index');
    Route::get('/structure/create', [StructureController::class, 'create'])->name('structure.create');
    Route::get('/structure', [StructureController::class, 'store'])->name('structure.store');
    Route::get('/structure/edit/{structure}', [StructureController::class, 'edit'])->name('structure.edit');
    Route::put('/structure/{structure}', [StructureController::class, 'update'])->name('structure.update');
    Route::delete('/structure/{structure}', [StructureController::class, 'destroy'])->name('structure.destroy');

    //LEADER
    Route::get('/leader', [LeaderController::class, 'index'])->name('leader.index');
    Route::get('/leader/create', [LeaderController::class, 'create'])->name('leader.create');
    Route::post('/leader', [LeaderController::class, 'store'])->name('leader.store');
    Route::get('/leader/edit/{leader}', [LeaderController::class, 'edit'])->name('leader.edit');
    Route::put('/leader/{leader}', [LeaderController::class, 'update'])->name('leader.update');
    Route::delete('/leader/{leader}', [LeaderController::class, 'destroy'])->name('leader.destroy');

    //TASK
    Route::get('/task', [TaskController::class, 'index'])->name('task.index');
    Route::get('/task/craete', [TaskController::class, 'create'])->name('task.create');
    Route::post('/task', [TaskController::class, 'store'])->name('task.store');
    Route::get('/task/edit/{task}', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/task/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');

    //POLICY
    Route::get('/policy', [PolicyController::class, 'index'])->name('policy.index');
    Route::get('/policy/create', [PolicyController::class, 'create'])->name('policy.create');
    Route::post('/policy', [PolicyController::class, 'store'])->name('policy.store');
    Route::get('/policy/edit/{policy}', [PolicyController::class, 'edit'])->name('policy.edit');
    Route::put('/policy/{policy}', [PolicyController::class, 'update'])->name('policy.update');
    Route::delete('/policy/{policy}', [PolicyController::class, 'destroy'])->name('policy.destroy');

    //IKU
    Route::get('/iku', [IkuController::class, 'index'])->name('iku.index');
    Route::get('/iku/create', [IkuController::class, 'create'])->name('iku.create');
    Route::post('/iku', [IkuController::class, 'store'])->name('iku.store');
    Route::get('/iku/edit/{iku}', [IkuController::class, 'edit'])->name('iku.edit');
    Route::put('/iku/{iku}', [IkuController::class, 'update'])->name('iku.update');
    Route::delete('/iku/{iku}', [IkuController::class, 'destroy'])->name('iku.destroy');

    //RENSTRA
    Route::get('/renstra', [RenstraController::class, 'index'])->name('renstra.index');
    Route::get('/renstra/create', [RenstraController::class, 'create'])->name('renstra.create');
    Route::post('/renstra', [RenstraController::class, 'store'])->name('renstra.store');
    Route::get('/renstra/edit/{renstra}', [RenstraController::class, 'edit'])->name('renstra.edit');
    Route::put('/renstra/{renstra}', [RenstraController::class, 'update'])->name('renstra.update');
    Route::delete('/renstra/{renstra}', [RenstraController::class, 'destroy'])->name('renstra.destroy');

    //SOP
    Route::get('/sop', [SopController::class, 'index'])->name('sop.index');
    Route::get('/sop/create', [SopController::class, 'create'])->name('sop.create');
    Route::post('/sop', [SopController::class, 'store'])->name('sop.store');
    Route::get('/sop/edit/{sop}', [SopController::class, 'edit'])->name('sop.edit');
    Route::put('/sop/{sop}', [SopController::class, 'update'])->name('sop.update');
    Route::delete('/sop/{sop}', [SopController::class, 'destroy'])->name('sop.destroy');

    //NERACA
    Route::get('/neraca', [NeracaController::class, 'index'])->name('neraca.index');
    Route::get('/neraca/create', [NeracaController::class, 'create'])->name('neraca.create');
    Route::post('/neraca', [NeracaController::class, 'store'])->name('neraca.store');
    Route::get('/neraca/edit/{neraca}', [NeracaController::class, 'edit'])->name('neraca.edit');
    Route::put('/neraca/{neraca}', [NeracaController::class, 'update'])->name('neraca.update');
    Route::delete('/neraca/{neraca}', [NeracaController::class, 'destroy'])->name('neraca.destroy');

    //BANNER
    Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/banner', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/banner/edit/{banner}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('/banner/{banner}', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('/banner/{banner}', [BannerController::class, 'destroy'])->name('banner.destroy');

    //EVALUATION
    Route::get('/evaluation', [EvaluationController::class, 'index'])->name('evaluation.index');
    Route::get('/evaluation/create', [EvaluationController::class, 'create'])->name('evaluation.create');
    Route::post('/evaluation', [EvaluationController::class, 'store'])->name('evaluation.store');
    Route::get('/evaluation/edit/{evaluation}', [EvaluationController::class, 'edit'])->name('evaluation.edit');
    Route::put('/evaluation/{evaluation}', [EvaluationController::class, 'update'])->name('evaluation.update');
    Route::delete('/evaluation/{evaluation}', [EvaluationController::class, 'destroy'])->name('evaluation.destroy');
    });

Route::group(['middleware'=>['auth', 'role:operator']], function()
{
    
});


