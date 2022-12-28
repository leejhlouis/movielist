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
});

Route::group(['middleware' => 'admin'], function(){
    Route::get('/movies/insert"', [MovieController::class, 'insert']);
    // Route::get('/movies/update/{id}"', [MovieController::class, 'update']);
    // Route::get('/movies/delete/{id}"', [MovieController::class, 'delete']);
});