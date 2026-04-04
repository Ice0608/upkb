<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProgramController;
use App\Http\Controllers\InstitusiController;
use App\Http\Controllers\AdminInstitusiController;
use App\Http\Controllers\AdminKhususController;
use App\Http\Controllers\AdminGaleriController;
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
Route::get('/institusi', [InstitusiController::class, 'index'])->name('institusi');
Route::get('/institusi/{id}', [InstitusiController::class, 'show'])->name('institusi.show');
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

    Route::get('/institusis', [AdminInstitusiController::class, 'index'])->name('admin.institusis');
    Route::get('/addinstitusi', [AdminInstitusiController::class, 'create'])->name('admin.addinstitusi');
    Route::post('/storeinstitusi', [AdminInstitusiController::class, 'store'])->name('admin.storeinstitusi');
    Route::get('/editinstitusi/{id}', [AdminInstitusiController::class, 'edit'])->name('admin.editinstitusi');
    Route::put('/updateinstitusi/{id}', [AdminInstitusiController::class, 'update'])->name('admin.updateinstitusi');
    Route::delete('/deleteinstitusi/{id}', [AdminInstitusiController::class, 'destroy'])->name('admin.deleteinstitusi');

    Route::get('/addkhusus/{kod_institusi}', [AdminKhususController::class, 'create'])->name('admin.addkhusus');
    Route::post('/storekhusus', [AdminKhususController::class, 'store'])->name('admin.storekhusus');
    Route::get('/editkhusus/{id}', [AdminKhususController::class, 'edit'])->name('admin.editkhusus');
    Route::put('/updatekhusus/{id}', [AdminKhususController::class, 'update'])->name('admin.updatekhusus');
    Route::delete('/deletekhusus/{id}', [AdminKhususController::class, 'destroy'])->name('admin.deletekhusus');

    Route::get('/addgaleri/{kod_institusi}', [AdminGaleriController::class, 'create'])->name('admin.addgaleri');
    Route::post('/storagaleri', [AdminGaleriController::class, 'store'])->name('admin.storagaleri');
    Route::get('/editgaleri/{id}', [AdminGaleriController::class, 'edit'])->name('admin.editgaleri');
    Route::put('/updategaleri/{id}', [AdminGaleriController::class, 'update'])->name('admin.updategaleri');
    Route::delete('/deletegaleri/{id}', [AdminGaleriController::class, 'destroy'])->name('admin.deletegaleri');
});

require __DIR__.'/auth.php';
