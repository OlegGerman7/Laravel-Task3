<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::resource('posts', PostController::class);
        Route::resource('users', UserController::class);
        Route::resource('events', EventController::class);
        Route::get('/profile', [ProfileController::class, 'show']);
    });
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::view('/contact', 'contact');

Route::view('/about', 'about');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/blog/{id}', [BlogController::class, 'show'])->name('show');

Route::get('/example', function(){
    return 'Hi ghost';
})->middleware('checkheader');

Route::get('/test', function(){
    return 'You passed example parametr';
})->middleware('check.example');

Route::get('/age', function(){
    return 'You are 18 years old';
})->middleware('check.user.age');

Route::get('/site-on-service', function(){
    return view('site-on-service');
})->name('site.on.service');
