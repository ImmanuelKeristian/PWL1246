<?php

use Illuminate\Support\Facades\Route;

/*

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/idx', function(){
    return view('index', [
        'kurikulum' => 'Kurikulum S1 Teknik Informatika',
        'courses' => ['IN210 Jaringan Komputer', 'IN211 Logika Informatika', 'IN242 Statistika']
    ]);
})->name('route-index');

Route::get('/about', function(){
    return view('about');
})->name('route-about');

Route::get('/form', function(){
    return view('form');
})->name('route-form');

// Route::post('/halo', function(\Illuminate\Http\Request $request){
//     return view('halo', [
//         'data' => $request->all()
//     ]);
// })->name('halo-user');

// Route::get('/form', [\App\Http\Controllers\PageController::class, 'create'])->name('route-form');

// Route::post('/halo', [\App\Http\Controllers\PageController::class, 'process'])->name('halo-user');