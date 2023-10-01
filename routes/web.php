<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommodityController;

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


Route::get('/file-import',[UserController::class, 'importView'])->name('import-view');
// Route::post('/import',[UserController::class, 'import']);
Route::get('/export-users',[UserController::class, 'exportUsers'])->name('export-users');

Route::controller(CommodityController::class)->group(function (){
    Route::get('/exportCommodity', 'Export');
    Route::post('/import', 'store')->name('import');
});

