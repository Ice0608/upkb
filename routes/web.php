<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('/about', 'about')->name('about');
use App\Http\Controllers\ProgramController;

Route::get('/program', [ProgramController::class, 'index'])->name('program');
Route::view('/kuota', 'kuota')->name('kuota');
Route::view('/faq', 'faq')->name('faq');
Route::view('/galeri', 'galeri')->name('galeri');
Route::view('/hubungi', 'hubungi')->name('hubungi');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/programs', [AdminProgramController::class, 'index'])->name('admin.programs');
    Route::get('/addprogram', [AdminProgramController::class, 'create'])->name('admin.addprogram');
    Route::post('/storeprogram', [AdminProgramController::class, 'store'])->name('admin.storeprogram');
    Route::get('/editprogram/{id}', [AdminProgramController::class, 'edit'])->name('admin.editprogram');
    Route::put('/updateprogram/{id}', [AdminProgramController::class, 'update'])->name('admin.updateprogram');
    Route::delete('/deleteprogram/{id}', [AdminProgramController::class, 'destroy'])->name('admin.deleteprogram');
});

require __DIR__.'/auth.php';
