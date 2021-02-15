<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\firstController;

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

Route::get('/', [firstController::class, 'index']);
Route::get('/about', [firstController::class, 'about']);
Route::get('/article/{id}', [firstController::class, 'article'])->where('id','[0-9]+');
Route::get('/songs/create', [firstController::class, "create"])->middleware('auth');
Route::post('/songs', [firstController::class, "store"])->middleware('auth');
Route::get('/users/{id}', [firstController::class, "user"])->where('id','[0-9]+');
Route::get("/changeLike/{id}", [firstController::class, "changeLike"])->middleware('auth')->where("id", "[0-9]+");
Route::get("/search/{search}", [firstController::class, "search"]);
<<<<<<< HEAD
Route::get('/favorite', [firstController::class, 'favorite']);
=======
Route::get("/changeSongLike/{id}", [firstController::class, "changeSongLike"])->middleware('auth')->where("id", "[0-9]+");

>>>>>>> f82675b74f1ca724aeb09086423dcb278cfa7221


Auth::routes();