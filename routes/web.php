<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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

Route::get('/', [PostController::class,'index']);

Route::resource('posts',PostController::class)->middleware('auth');
Route::resource('tags',TagController::class)->middleware('auth');

Route::post('/reg',[UserController::class, 'registration']);
Route::post('/auth',[UserController::class, 'auth']);
Route::get('/logout',[UserController::class, "logout"])
->middleware('auth')
->name('logout');

Route::get('/profile',[UserController::class, "index"])
->name('profile')
->middleware('auth');
