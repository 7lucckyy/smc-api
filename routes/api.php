<?php

use App\Http\Controllers\AuthController;
use auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\CohortController;
use App\Http\Controllers\CoverageController;
use App\Http\Controllers\CommodityController;

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

Route::middleware('auth:sanctum')->get('/cohort/getDatas', function () {
    return response()->json(['Hello'=> 'Greetings']);
});


Route::controller(AuthController::class)->group(function (){
    Route::post('/user', 'register');
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

Route::controller(CohortController::class)->group(function (){
    Route::get('/exportCohort', 'Export');
    Route::post('/cohort', 'store');
    Route::get('/cohort/getData', 'index');
 
});

Route::controller(VisitController::class)->group(function (){
    Route::get('/exportVisit', 'Eport');
    Route::post('/visit', 'store');
    Route::get('/visit/getData', 'index');
});