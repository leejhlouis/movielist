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

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'newLogin']);
Route::get('/register', [UserController::class, 'regis']);
Route::post('/register', [UserController::class, 'newUser']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/movies/{id}', [MovieController::class, 'details']);
Route::get('/insert', [MovieController::class, 'showActorInInsert']);
Route::post('/insert', [MovieController::class, 'addMovie']);
Route::post('/edit', [MovieController::class, 'showData']);

Route::get('/actors', [ActorController::class, 'index']);
Route::get('/actors/{id}', [ActorController::class, 'details']);
Route::get('/watchlist', [WatchlistController::class, 'index']);

