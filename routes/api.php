<?php

use App\Http\Controllers\API\MahasiswaController;
use App\Http\Controllers\API\CandidateController;
use App\Http\Controllers\API\PostController;
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

/**  Auth */
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});

Route::get('candidate', [CandidateController::class, 'index']);
Route::post('candidate/store', [CandidateController::class, 'store']);
Route::get('candidate/show/{id}', [CandidateController::class, 'show']);
Route::post('candidate/update/{id}', [CandidateController::class, 'update']);
Route::get('candidate/destroy/{id}', [CandidateController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function() {
    // list all posts
    Route::get('posts', [PostController::class, 'post']);
    // get a post
    Route::get('posts/{id}', [PostController::class, 'singlePost']);
    // add a new post
    Route::post('posts', [PostController::class, 'createPost']);
    // updating a post
    Route::put('posts/{id}', [PostController::class, 'updatePost']);
    // delete a post
    Route::delete('posts/{id}', [PostController::class, 'deletePost']);
    // add a new user with writer scope
    Route::post('users/writer', [PostController::class, 'createWriter']);
    // add a new user with subscriber scope
    Route::post(
        'users/subscriber',
        [ControllerExample::class, 'createSubscriber']
    );
    // delete a user
    Route::delete('users/{id}', [ControllerExample::class, 'deleteUser']);
});
