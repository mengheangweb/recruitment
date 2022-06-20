<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::get('/',  [HomeController::class, 'index']);

Route::get('home', [HomeController::class, 'index']);
Route::get('contact', [PageController::class, 'contact']);
Route::get('listing', [PostController::class, 'index']);
Route::get('listing/post', [PostController::class, 'post']);
Route::post('listing/create', [PostController::class, 'store'])->name('store-post');

Route::get('register', [UserController::class, 'register'])->name('registration');
Route::post('store-register', [UserController::class, 'store'])->name('store-registration');

