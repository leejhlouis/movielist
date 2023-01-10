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
Route::get('/movies/{id}', [MovieController::class, 'details'])->whereNumber('id');

Route::get('/actors', [ActorController::class, 'index']);
Route::get('/actors/{id}', [ActorController::class, 'details'])->whereNumber('id');

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'newLogin']);
    Route::get('/register', [UserController::class, 'regis']);
    Route::post('/register', [UserController::class, 'newUser']);
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [UserController::class, 'logout']);
    
    Route::prefix('profile')->group(function () {
        Route::get('/', [UserController::class, 'profile']);
        Route::post('/', [UserController::class, 'updateProfile']);

    });
});

Route::group(['middleware' => 'user'], function(){
    Route::prefix('watchlist')->group(function () {
        Route::get('/', [WatchlistController::class, 'index']);
        Route::put('/{id}', [WatchlistController::class, 'updateStatus'])->whereNumber('id');
        Route::get('/add/{id}', [WatchlistController::class, 'add'])->whereNumber('id');
        Route::get('/remove/{id}', [WatchlistController::class, 'remove'])->whereNumber('id');
    });
});


Route::group(['middleware' => 'admin'], function(){

    Route::prefix('movies')->group(function () {
        Route::get('/insert', [MovieController::class, 'showInsertPage']);
        Route::post('/insert', [MovieController::class, 'addMovie']);

        Route::get('/update/{id}', [MovieController::class, 'showUpdatePage']);
        Route::post('/update/{id}', [MovieController::class, 'updateData']);

        Route::get('/delete/{id}', [MovieController::class, 'delete']);
    });

    Route::prefix('actors')->group(function () {
        Route::get('/insert', [ActorController::class, 'insert']);
        Route::post('/insert', [ActorController::class, 'insertDo']);

        Route::get('/update/{id}', [ActorController::class, 'update']);
        Route::post('/update/{id}', [ActorController::class, 'updateDo']);

        Route::get('/delete/{id}', [ActorController::class, 'delete']);
    });
});
