<?php

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



Auth::routes();

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');

Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
Route::post('/post', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create']);
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show']);

Route::post('follow/{user}',[App\Http\Controllers\FollowingController::class, 'store']);



