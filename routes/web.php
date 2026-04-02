<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('/about', 'about')->name('about');
Route::view('/program', 'program.program')->name('program');
Route::view('/kuota', 'kuota')->name('kuota');
Route::view('/faq', 'faq')->name('faq');
Route::view('/galeri', 'galeri')->name('galeri');
Route::view('/hubungi', 'hubungi')->name('hubungi');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
