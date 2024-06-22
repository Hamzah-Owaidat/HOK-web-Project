<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function(){

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/games/{id}', [GamesController::class, 'index'])->name('games');
    Route::post('auth/logout',[AuthController::class,'destroy'])->name('logout');
    Route::prefix('profile')->group(function(){
        Route::get('/{userId}', [ProfileController::class, 'index'])->name('profile');
        Route::get('/{userId}/edit', [ProfileController::class, 'edit'])->name('edit.profile');
        Route::post('/{userId}', [ProfileController::class, 'update'])->name('update.profile');
    });





});



// Auth Routing
Route::prefix('auth')->group(function(){
    // Login Routing
    Route::get('/login',[AuthController::class,'loginView'])->name('login_view');
    Route::post('/login',[AuthController::class,'loginPost'])->name('login_post');


    // Register Routing
    Route::get('/register',[AuthController::class,'registerView'])->name('register_view');
    Route::post('/register',[AuthController::class,'registerPost'])->name('register_post');
});

// Language Routing
Route::get('/lang/{locale}',[LangController::class, 'setLang'])->name('webLang');





