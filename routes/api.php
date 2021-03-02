<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::get('/', function () {
    return response()->json([
        'message' => 'Nofaro API', 'status' => 'Connected'
    ]);
});

// Pets
Route::get('pets/{id}', [ApiController::class, 'showPet']);
Route::get('pets',  [ApiController::class, 'showAllPets']);
Route::post('pets', [ApiController::class, 'createPet']);
Route::delete('pets/{id}', [ApiController::class, 'deletePet']);
Route::put('pets/{id}', [ApiController::class, 'updatePet']);

// Cares
Route::get('cares',  [ApiController::class, 'showAllCares']);
Route::get('cares/{id}', [ApiController::class, 'showCare']);
Route::post('cares', [ApiController::class, 'createCare']);
Route::delete('cares/{id}', [ApiController::class, 'deleteCare']);
Route::put('cares/{id}', [ApiController::class, 'updateCare']);
