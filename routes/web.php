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
Route::get('/favorite', [firstController::class, 'favorite']);


Auth::routes();