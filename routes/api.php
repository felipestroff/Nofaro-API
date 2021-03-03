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
Route::get('query/pets', [ApiController::class, 'QueryPets']);
Route::post('pets', [ApiController::class, 'createPet']);
Route::put('pets/{id}', [ApiController::class, 'updatePet']);
Route::delete('pets/{id}', [ApiController::class, 'deletePet']);

// Cares
Route::get('cares/{id}', [ApiController::class, 'showCare']);
Route::get('cares',  [ApiController::class, 'showAllCares']);
Route::get('query/cares', [ApiController::class, 'QueryCares']);
Route::post('cares', [ApiController::class, 'createCare']);
Route::put('cares/{id}', [ApiController::class, 'updateCare']);
Route::delete('cares/{id}', [ApiController::class, 'deleteCare']);
