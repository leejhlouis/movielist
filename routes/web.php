<?php

use App\Http\Controllers\ActorController;
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
Route::get('/movies/{id}', [MovieController::class, 'details']);
Route::get('/actors', [ActorController::class, 'index']);
Route::get('/actors/{id}', [ActorController::class, 'details']);
Route::get('/watchlist', [WatchlistController::class, 'index']);
