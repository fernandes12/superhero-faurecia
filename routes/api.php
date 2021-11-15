<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SuperheroController;
use App\Http\Controllers\API\AbilityController;
use App\Http\Controllers\API\TeamController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("index", [SuperheroController::class, 'index'])->name('api.home');
Route::get("superhero", [SuperheroController::class, 'create'])->name('api.create');
Route::get("all-superheros", [SuperheroController::class, 'all_superheros'])->name('api.all');
Route::post("store", [SuperheroController::class, 'store'])->name('api.store');
Route::get("view/{id}", [SuperheroController::class, 'show'])->name('api.view');
Route::get("edit/{id}", [SuperheroController::class, 'edit'])->name('api.edit');
Route::post("edit", [SuperheroController::class, 'update'])->name('api.update');
Route::get("delete/{id}", [SuperheroController::class, 'destroy'])->name('api.delete');
Route::get("find", [SuperheroController::class, 'find'])->name('api.find');
Route::get("find_hero/{name}", [SuperheroController::class, 'find_hero'])->name('api.find_hero');

//Abilities
Route::get("abilities", [AbilityController::class, 'index'])->name('api.abilities');
Route::get("ability", [AbilityController::class, 'create'])->name('api.ability');
Route::post("store-ability", [AbilityController::class, 'store'])->name('api.store_ability');
Route::get("delete-ability/{id}", [AbilityController::class, 'destroy'])->name('api.delete_ability');

//Team
Route::get("teams", [TeamController::class, 'index'])->name('api.teams');
Route::get("team", [TeamController::class, 'create'])->name('api.team');
Route::post("store-team", [TeamController::class, 'store'])->name('api.store_team');
Route::get("delete-team/{id}", [TeamController::class, 'destroy'])->name('api.delete_team');

