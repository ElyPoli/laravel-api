<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('guests.welcome');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Raggruppo le rotte per la parte admin di "projects" e applicco il middleware per verificare che l'utente sia loggato
Route::middleware(['auth', 'verified'])
    ->prefix("admin") // aggiunge a tutte le rotte il prefisso indicato
    ->name("admin.") // aggiunge al name di tutte le rotte il prefisso indicato
    ->group(function () {
        // Create
        Route::get("/projects/create", [ProjectController::class, "create"])->name("projects.create");
        Route::post("/projects", [ProjectController::class, "store"])->name("projects.store");
        // Read
        Route::get("/projects", [ProjectController::class, "index"])->name("projects.index");
        Route::get("/projects/{project}", [ProjectController::class, "show"])->name("projects.show");
        // Udate
        Route::get("/projects/{project}/edit", [ProjectController::class, "edit"])->name("projects.edit");
        Route::put("/projects/{project}", [ProjectController::class, "update"])->name("projects.update");
        // Destroy
        Route::delete("/projects/{project}", [ProjectController::class, "destroy"])->name("projects.destroy");
    });

// Raggruppo le rotte per la parte admin di "types" e applicco il middleware per verificare che l'utente sia loggato
Route::middleware(['auth', 'verified'])
    ->prefix("admin") // aggiunge a tutte le rotte il prefisso indicato
    ->name("admin.") // aggiunge al name di tutte le rotte il prefisso indicato
    ->group(function () {
        // Create
        Route::get("/types/create", [TypeController::class, "create"])->name("types.create");
        Route::post("/types", [TypeController::class, "store"])->name("types.store");
        // Read
        Route::get("/types", [TypeController::class, "index"])->name("types.index");
        Route::get("/types/{type}", [TypeController::class, "show"])->name("types.show");
        // Udate
        Route::get("/types/{type}/edit", [TypeController::class, "edit"])->name("types.edit");
        Route::put("/types/{type}", [TypeController::class, "update"])->name("types.update");
        // Destroy
        Route::delete("/types/{type}", [TypeController::class, "destroy"])->name("types.destroy");
    });

// Raggruppo le rotte per la parte admin di "technologies" e applicco il middleware per verificare che l'utente sia loggato
Route::middleware(['auth', 'verified'])
    ->prefix("admin") // aggiunge a tutte le rotte il prefisso indicato
    ->name("admin.") // aggiunge al name di tutte le rotte il prefisso indicato
    ->group(function () {
        // Create
        Route::get("/technologies/create", [TechnologyController::class, "create"])->name("technologies.create");
        Route::post("/technologies", [TechnologyController::class, "store"])->name("technologies.store");
        // Read
        Route::get("/technologies", [TechnologyController::class, "index"])->name("technologies.index");
        Route::get("/technologies/{technology}", [TechnologyController::class, "show"])->name("technologies.show");
        // Udate
        Route::get("/technologies/{technology}/edit", [TechnologyController::class, "edit"])->name("technologies.edit");
        Route::put("/technologies/{technology}", [TechnologyController::class, "update"])->name("technologies.update");
        // Destroy
        Route::delete("/technologies/{technology}", [TechnologyController::class, "destroy"])->name("technologies.destroy");
    });

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

require __DIR__ . '/auth.php';
