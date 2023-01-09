<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MovieController::class, 'index']);

Route::get('/home', [MovieController::class, 'index']);
Route::get('/movies/{id}', [MovieController::class, 'details']);


Route::get('/actors', [ActorController::class, 'index']);

Route::get('/actors/{id}', [ActorController::class, 'details']);


Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'newLogin']);
    Route::get('/register', [UserController::class, 'regis']);
    Route::post('/register', [UserController::class, 'newUser']);
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [UserController::class, 'logout']);
});

Route::group(['middleware' => 'user'], function(){
    Route::prefix('watchlist')->group(function () {
        Route::get('/', [WatchlistController::class, 'index']);
        Route::put('/{id}', [WatchlistController::class, 'updateStatus']);
        Route::get('/add/{id}', [WatchlistController::class, 'add']);
        Route::get('/remove/{id}', [WatchlistController::class, 'remove']);
    });
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/profile', [UserController::class, 'updateProfile']);
});

Route::get('/insert', [MovieController::class, 'showActorInInsert']);
Route::get('/movies/update/{id}', [MovieController::class, 'showData']);
Route::post('/movies/update/{id}', [MovieController::class, 'updateData']);

Route::get('/actors/insertactor', [ActorController::class, 'insert']);
Route::post('/actors/insertactor', [ActorController::class, 'insertDo']);

Route::group(['middleware' => 'admin'], function(){

    Route::prefix('movies')->group(function () {
        // Route::get('/insert', [MovieController::class, 'insert']);
        // Route::get('/update/{id}', [MovieController::class, 'update']);
        Route::get('/delete/{id}', [MovieController::class, 'delete']);
        // Route::get('/insert', [MovieController::class, 'showActorInInsert']);
        Route::post('/insert', [MovieController::class, 'addMovie']);

        // Route::get('/movies/update/{id}', [MovieController::class, 'showData']);
        // Route::post('/movies/update/{id}', [MovieController::class, 'updateData']);
    });

    Route::prefix('actors')->group(function () {
        // Route::get('/insert', [ActorController::class, 'insert']);
        // Route::get('/update/{id}', [ActorController::class, 'update']);
        Route::get('/delete/{id}', [ActorController::class, 'delete']);
        // Route::get('/actors/insertactor', [ActorController::class, 'insert']);
        // Route::post('/actors/insertactor', [ActorController::class, 'insertDo']);
        Route::get('/actors/update/{id}', [ActorController::class, 'update']);
        Route::post('/actors/update/{id}', [ActorController::class, 'updateDo']);
    });
});
