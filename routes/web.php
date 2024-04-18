<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
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

// Route::get('/', function () {
//     return redirect(route('login'));
// });

Route::middleware(['guest'])->group(function() {
    Route::get('/', [SesiController::class, 'index'])->name('auth.login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function(){
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/admin/student', [AdminController::class, 'student'])->middleware('userAkses:student');
    Route::get('/admin/program', [AdminController::class, 'program'])->middleware('userAkses:program');
    Route::get('/logout', [SesiController::class, 'logout']);
});




require __DIR__.'/auth.php';