<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClasseController;
use App\Http\Controllers\Api\EtudiantController;
use App\Http\Controllers\Api\FiliereController;
use App\Http\Controllers\Api\InscriptionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('classes', ClasseController::class);
    Route::resource('etudiants', EtudiantController::class);
    Route::resource('filieres', FiliereController::class);
    Route::resource('inscriptions', InscriptionController::class);
});
