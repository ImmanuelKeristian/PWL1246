<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\PolController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MatKulController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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

// Route::get('/', function () {
//     return redirect(route('login'));
// });

Route::middleware(['guest'])->group(function() {
    Route::get('/', [LoginController::class, 'index'])->name('auth.login');
    Route::post('/login-proses', [LoginController::class, 'loginproses'])->name('login-proses');
});

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'registerproses'])->name('register-proses');


Route::get('/home', function(){
    return redirect('/starter');
});

Route::middleware(['auth'])->group(function(){
    #Admiin
    Route::prefix('Admin')->group(function () {
        Route::get('/index', [AkunController::class, 'index'])->name('admin-index')->middleware('userAkses:Admin');
        Route::get('/edit/{id}', [AkunController::class, 'edit'])->name('admin-edit')->middleware('userAkses:Admin');
        Route::put('/update/{id}', [AkunController::class, 'update'])->name('admin-update')->middleware('userAkses:Admin');
        Route::delete('/delete/{id}', [AkunController::class, 'delete'])->name('admin-delete')->middleware('userAkses:Admin');
    });

    # Prodi
    Route::prefix('Prodi')->group(function () {
        #Matkul
        Route::get('/indexz', [MatKulController::class, 'index'])->name('mat-index')->middleware('userAkses:Prodi');
        Route::get('/createz', [MatKulController::class, 'create'])->name('mat-create')->middleware('userAkses:Prodi');
        Route::post('/storez', [MatKulController::class, 'store'])->name('mat-store')->middleware('userAkses:Prodi');
        Route::get('/editz/{id}', [MatKulController::class, 'edit'])->name('mat-edit')->middleware('userAkses:Prodi');
        Route::put('/updatez/{id}', [MatKulController::class, 'update'])->name('mat-update')->middleware('userAkses:Prodi');
        Route::delete('/deletez/{id}', [MatKulController::class, 'delete'])->name('mat-delete')->middleware('userAkses:Prodi');

        #Poll
        Route::get('/index', [PolController::class, 'index'])->name('pol-index')->middleware('userAkses:Prodi');
        Route::get('/create', [PolController::class, 'create'])->name('pol-create')->middleware('userAkses:Prodi');
        Route::post('/store', [PolController::class, 'store'])->name('pol-store')->middleware('userAkses:Prodi');
        Route::get('/edit/{id}', [PolController::class, 'edit'])->name('pol-edit')->middleware('userAkses:Prodi');
        Route::put('/update/{id}', [PolController::class, 'update'])->name('pol-update')->middleware('userAkses:Prodi');
        Route::delete('/delete/{id}', [PolController::class, 'delete'])->name('pol-delete')->middleware('userAkses:Prodi');
    });

    Route::prefix('Student')->group(function () {
        Route::get('/index', [FormController::class, 'index'])->name('for-index')->middleware('userAkses:Student');
        Route::get('/create/{id}', [FormController::class, 'create'])->name('for-create')->middleware('userAkses:Student');
        Route::post('/store', [FormController::class, 'store'])->name('for-store')->middleware('userAkses:Student');
    });

    Route::get('/index', [PolController::class, 'index'])->name('pol-index');
    Route::get('/index', [MatKulController::class, 'index'])->name('mat-index');
    Route::get('/logout', [LoginController::class, 'logout']);
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/starter', function () {
//         return view('starter');
//     })->name('starter');
// });

// Route::middleware(['auth','admin'])->group(function(){
//     Route::get('/admin-create', [AdminController::class, 'admin-create'])->name('admin-create');
//     Route::get('/admin/student', [AdminController::class, 'student'])->middleware('userAkses:student');
//     Route::get('/admin/program', [AdminController::class, 'program'])->middleware('userAkses:program');
//     Route::get('/logout', [SesiController::class, 'logout']);

//     Route::get('/user', [UserController::class, 'index'])->name('user-list');
//     Route::get('/user/create', [UserController::class, 'create'])->name('user-create');
//     Route::post('/user/create', [UserController::class, 'store'])->name('user-store');
// });

require __DIR__.'/auth.php';