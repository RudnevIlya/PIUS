<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Domain\Actors\Catalog\Models\Doctor;
use App\Domain\Film\Catalog\Models\Film;
use App\Domain\Cast\Catalog\Models\Cast;
use App\Http\ApiV1\Modules\Requests\PatchFilmRequest;
use App\Http\ApiV1\Modules\Requests\PatchCastRequest;
use App\Http\ApiV1\Modules\Actors\Controllers\ActorsController;
use App\Http\ApiV1\Modules\Films\Controllers\FilmsController;
use App\Http\ApiV1\Modules\Casts\Controllers\CastsController;
use App\Http\ApiV1\Modules\Actors\Requests\PatchDoctorRequest;


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

Route::get('v1/actors/{id}', [ActorsController::class, 'get']);
Route::patch('v1/actors/{id}', [ActorsController::class, 'patch']);
Route::post('v1/actors/', [ActorsController::class, 'post']);
Route::delete('v1/actors/{id}', [ActorsController::class, 'delete']);
Route::put('v1/actors/{id}', [ActorsController::class, 'put']);

Route::get('v1/casts/{id}', [CastsController::class, 'get']);
Route::patch('v1/casts/{id}', [CastsController::class, 'patch']);
Route::post('v1/casts/', [CastsController::class, 'post']);
Route::delete('v1/casts/{id}', [CastsController::class, 'delete']);
Route::put('v1/casts/{id}', [CastsController::class, 'put']);

Route::get('v1/films/{id}', [FilmsController::class, 'get']);
Route::patch('v1/films/{id}', [FilmsController::class, 'patch']);
Route::post('v1/films/', [FilmsController::class, 'post']);
Route::delete('v1/films/{id}', [FilmsController::class, 'delete']);
Route::put('v1/films/{id}', [FilmsController::class, 'put']);