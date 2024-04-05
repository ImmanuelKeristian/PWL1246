<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\HomeControllers;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', function(){
    return view('about');
})->name('route-about');

Route::get('/form', [\App\Http\Controllers\PageController::class, 'create'])->name('route-form');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthControllers::class, 'register'])->name('register');
    Route::post('/register', [AuthControllers::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthControllers::class, 'login'])->name('login');
    Route::post('/login', [AuthControllers::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeControllers::class, 'index']);
    Route::delete('/logout', [AuthControllers::class, 'logout'])->name('logout');
});

