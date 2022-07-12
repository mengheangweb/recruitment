<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConfigController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;

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
Route::middleware('locale')->group(function() {

    Route::get('/',  [HomeController::class, 'index']);

    Route::get('home', [HomeController::class, 'index']);
    Route::get('contact', [PageController::class, 'contact']);
    Route::get('listing', [PostController::class, 'index']);
    Route::get('listing/show/{id}', [PostController::class, 'show']);
    Route::get('lang/{code}', [ConfigController::class, 'switch']);

    Route::middleware('auth')->group(function() {
        Route::get('listing/post', [PostController::class, 'post']);
        Route::post('listing/create', [PostController::class, 'store'])->name('store-post');
        Route::get('my-listing', [PostController::class, 'myListing'])->name('my-listing');
        Route::get('listing/edit/{id}', [PostController::class, 'edit']);
        Route::patch('listing/update/{id}', [PostController::class, 'update'])->name('update-post');
        Route::get('listing/delete/{id}', [PostController::class, 'delete']);
        Route::get('listing/restore/{id}', [PostController::class, 'restore']);
    });

    Route::get('register', [UserController::class, 'register'])->name('registration');
    Route::post('store-register', [UserController::class, 'store'])->name('store-registration');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('login', [UserController::class, 'formLogin'])->name('login');
    Route::post('do-login', [UserController::class, 'doLogin'])->name('do-login');

});

Route::prefix('admin')->group(function() {
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('login', [AdminController::class, 'formLogin'])->name('admin.login');
    Route::post('do-login', [AdminController::class, 'doLogin'])->name('admin.do-login');

   // Route::middleware('admin')->group(function() {
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('dashboard', [DashboardController::class, 'index']);
  //  });
});

