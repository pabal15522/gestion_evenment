<?php

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
// Routes pour les événements
Route::get('/events', [App\Http\Controllers\Api\EvenementController::class, 'index'])->name('events.index');
Route::post('/events', [App\Http\Controllers\Api\EvenementController::class, 'store'])->name('events.store');
Route::get('/events/{id}', [App\Http\Controllers\Api\EvenementController::class, 'show'])->name('events.show');
Route::put('/events/{id}', [App\Http\Controllers\Api\EvenementController::class, 'update'])->name('events.update');
Route::delete('/events/{id}', [App\Http\Controllers\Api\EvenementController::class, 'destroy'])->name('events.destroy');

// Routes pour les inscriptions
Route::post('/events/{id}/register', [App\Http\Controllers\Api\InscriptionController::class, 'store'])->name('registrations.store');
Route::get('/events/{id}/registrations', [App\Http\Controllers\Api\InscriptionController::class, 'index'])->name('registrations.index');
Route::delete('/registrations/{id}', [App\Http\Controllers\Api\InscriptionController::class, 'destroy'])->name('registrations.destroy');
