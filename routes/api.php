<?php

use App\Http\Controllers\API\MahasiswaController;
use App\Http\Controllers\API\CandidateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('mahasiswa', [MahasiswaController::class, 'index']);
Route::post('mahasiswa/store', [MahasiswaController::class, 'store']);
Route::get('mahasiswa/show/{id}', [MahasiswaController::class, 'show']);
Route::post('mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
Route::get('mahasiswa/destroy/{id}', [MahasiswaController::class, 'destroy']);

Route::get('candidate', [CandidateController::class, 'index']);
Route::post('candidate/store', [CandidateController::class, 'store']);
Route::get('candidate/show/{id}', [CandidateController::class, 'show']);
Route::post('candidate/update/{id}', [CandidateController::class, 'update']);
Route::get('candidate/destroy/{id}', [CandidateController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
