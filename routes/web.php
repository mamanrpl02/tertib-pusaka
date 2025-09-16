<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::middleware(['auth:student'])->group(function () {
    Route::view('/beranda', 'student.pages.beranda')->name('beranda');
    Route::view('/top-student', 'student.pages.top-student')->name('top-student');
    Route::view('/rules', 'student.pages.rules')->name('rules');
    Route::view('/profile', 'student.pages.profile')->name('profile');
});


require __DIR__ . '/auth.php';
