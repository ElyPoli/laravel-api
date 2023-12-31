<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Creo la rotta api per mostrare tutti i progetti
Route::get("projects", [ProjectController::class, "index"]);

// Creo la rotta api per mostrare il singolo progetto
Route::get('/projects/{slug}', [ProjectController::class, 'show']);

// Creo la rotta api per salvare i dati del form dei contatti
Route::post('/contacts', [ContactController::class, 'store']);