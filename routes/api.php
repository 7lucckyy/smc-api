<?php

use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\CohortController;
use App\Http\Controllers\CoverageController;
use App\Http\Controllers\CommodityController;
use App\Http\Controllers\OverviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Public Routes
Route::controller(AuthController::class)->group(function (){
    Route::post('/user', 'register');
    Route::post('/auth', 'login');
 
});

//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::controller(VisitController::class)->group(function (){
        Route::get('/exportVisit', 'Eport');
        Route::post('/visit', 'store');
        Route::get('/visit/getData', 'index');
    });
    Route::controller(CohortController::class)->group(function (){
        Route::get('/exportCohort', 'Export');
        Route::post('/cohort', 'store');
        Route::get('/cohort/getData', 'index');
    
    });
    Route::controller(CommodityController::class)->group(function (){
        Route::get('/exportCommodity', 'Export');
        Route::post('/commodity', 'store');
        Route::get('/commodity/getData', 'index');
    });
    Route::controller(CoverageController::class)->group(function () {
        Route::get('/exportCoverage', 'Export');
        Route::post('/coverage', 'store');
        Route::get('/coverage/getData', 'index');
    });
    Route::controller(OverviewController::class)->group(function (){
        Route::get('/overview/getData', 'index');
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});

