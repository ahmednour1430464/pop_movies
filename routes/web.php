<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MovieController;
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

Route::get('/movies',[MovieController::class,'index'])->name('movies');
Route::get('/',[MovieController::class,'index'])->name('movies');
Route::get('/movies/{movie}',[MovieController::class,'show'])->name('movie.info');

Route::get('/actors',[ActorsController::class,'index'])->name('actors');
Route::get('/actors/page/{page?}',[ActorsController::class,'index']);
Route::get('/actors/details/{id}',[ActorsController::class,'show'])->name('actor.details');
