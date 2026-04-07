<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProgramController;
use App\Http\Controllers\InstitusiController;
use App\Http\Controllers\AdminInstitusiController;
use App\Http\Controllers\AdminKursusController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin only routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        abort_if(auth()->user()->level !== 'admin', 403);
        return view('admin.dashboard');
    })->name('dashboard');
});

// Staff only routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/staff/main', function () {
        abort_if(auth()->user()->level !== 'staff', 403);
        return view('staff.main');
    })->name('staff.main');
});

Route::view('/about', 'about')->name('about');
use App\Http\Controllers\ProgramController;

Route::get('/program', [ProgramController::class, 'index'])->name('program');
Route::get('/institusi', [InstitusiController::class, 'index'])->name('institusi');
Route::get('/institusi/{id}', [InstitusiController::class, 'show'])->name('institusi.show');
Route::view('/kuota', 'kuota')->name('kuota');
Route::view('/faq', 'faq')->name('faq');
Route::view('/galeri', 'galeri')->name('galeri');
Route::get('/hubungi', [MessageController::class, 'show'])->name('hubungi');
Route::post('/hubungi', [MessageController::class, 'store'])->name('hubungi.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::get('/adduser', [AdminUserController::class, 'create'])->name('admin.adduser');
    Route::post('/storeuser', [AdminUserController::class, 'store'])->name('admin.storeuser');
    Route::get('/edituser/{user}', [AdminUserController::class, 'edit'])->name('admin.edituser');
    Route::put('/updateuser/{user}', [AdminUserController::class, 'update'])->name('admin.updateuser');
    Route::delete('/deleteuser/{user}', [AdminUserController::class, 'destroy'])->name('admin.deleteuser');

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

    Route::get('/addkursus/{kod_institusi}', [AdminKursusController::class, 'create'])->name('admin.addkursus');
    Route::post('/storekursus', [AdminKursusController::class, 'store'])->name('admin.storekursus');
    Route::get('/editkursus/{id}', [AdminKursusController::class, 'edit'])->name('admin.editkursus');
    Route::put('/updatekursus/{id}', [AdminKursusController::class, 'update'])->name('admin.updatekursus');
    Route::delete('/deletekursus/{id}', [AdminKursusController::class, 'destroy'])->name('admin.deletekursus');
    Route::post('/storesyarat', [AdminKursusController::class, 'storeSyarat'])->name('admin.storesyarat');
    Route::delete('/deletesyarat/{id}', [AdminKursusController::class, 'destroySyarat'])->name('admin.deletesyarat');
    Route::post('/storesilibus', [AdminKursusController::class, 'storeSilibus'])->name('admin.storesilibus');
    Route::delete('/deletesilibus/{id}', [AdminKursusController::class, 'destroySilibus'])->name('admin.deletesilibus');
    Route::post('/storekerjaya', [AdminKursusController::class, 'storeKerjaya'])->name('admin.storekerjaya');
    Route::delete('/deletekerjaya/{id}', [AdminKursusController::class, 'destroyKerjaya'])->name('admin.deletekerjaya');
    Route::post('/storeyuranpendaftaran', [AdminKursusController::class, 'storeYuranPendaftaran'])->name('admin.storeyuranpendaftaran');
    Route::delete('/deleteyuranpendaftaran/{id}', [AdminKursusController::class, 'destroyYuranPendaftaran'])->name('admin.deleteyuranpendaftaran');
    Route::post('/storeyuranpilihan', [AdminKursusController::class, 'storeYuranPilihan'])->name('admin.storeyuranpilihan');
    Route::delete('/deleteyuranpilihan/{id}', [AdminKursusController::class, 'destroyYuranPilihan'])->name('admin.deleteyuranpilihan');
    Route::post('/storeyuranasrama', [AdminKursusController::class, 'storeYuranAsrama'])->name('admin.storeyuranasrama');
    Route::delete('/deleteyuranasrama/{id}', [AdminKursusController::class, 'destroyYuranAsrama'])->name('admin.deleteyuranasrama');
    Route::post('/storeyuranpengajian', [AdminKursusController::class, 'storeYuranPengajian'])->name('admin.storeyuranpengajian');
    Route::delete('/deleteyuranpengajian/{id}', [AdminKursusController::class, 'destroyYuranPengajian'])->name('admin.deleteyuranpengajian');
    Route::post('/storeelaun', [AdminKursusController::class, 'storeElaun'])->name('admin.storeelaun');
    Route::delete('/deleteelaun/{id}', [AdminkursusController::class, 'destroyElaun'])->name('admin.deleteelaun');

    Route::get('/tabmaklumat/{id}', [AdminkursusController::class, 'tabMaklumat'])->name('admin.tabmaklumat');
    Route::get('/tabsyarat/{id}', [AdminkursusController::class, 'tabSyarat'])->name('admin.tabsyarat');
    Route::get('/tabsilibus/{id}', [AdminkursusController::class, 'tabSilibus'])->name('admin.tabsilibus');
    Route::get('/tabkerjaya/{id}', [AdminkursusController::class, 'tabKerjaya'])->name('admin.tabkerjaya');
    Route::get('/tabyuran/{id}', [AdminkursusController::class, 'tabYuran'])->name('admin.tabyuran');

    Route::get('/addgaleri/{kod_institusi}', [AdminGaleriController::class, 'create'])->name('admin.addgaleri');
    Route::post('/storagaleri', [AdminGaleriController::class, 'store'])->name('admin.storagaleri');
    Route::get('/editgaleri/{id}', [AdminGaleriController::class, 'edit'])->name('admin.editgaleri');
    Route::put('/updategaleri/{id}', [AdminGaleriController::class, 'update'])->name('admin.updategaleri');
    Route::delete('/deletegaleri/{id}', [AdminGaleriController::class, 'destroy'])->name('admin.deletegaleri');

    Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages');
    Route::get('/messages/{id}', [MessageController::class, 'showMessage'])->name('admin.message-detail');
    Route::post('/messages/{id}/comment', [MessageController::class, 'updateComment'])->name('admin.message-comment');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('admin.message-delete');
});

Route::get('/kursus/{id}', [kursusController::class, 'show'])->name('kursus.show');
Route::get('/kursus/{id}/pdf', [kursusController::class, 'pdf'])->name('kursus.pdf');

Route::get('/kursus/tabmaklumat/{id}', [kursusController::class, 'tabMaklumat'])->name('kursus.tabmaklumat');
Route::get('/kursus/tabsyarat/{id}', [kursusController::class, 'tabSyarat'])->name('kursus.tabsyarat');
Route::get('/kursus/tabsilibus/{id}', [kursusController::class, 'tabSilibus'])->name('kursus.tabsilibus');
Route::get('/kursus/tabkerjaya/{id}', [kursusController::class, 'tabKerjaya'])->name('kursus.tabkerjaya');
Route::get('/kursus/tabyuran/{id}', [kursusController::class, 'tabYuran'])->name('kursus.tabyuran');

require __DIR__.'/auth.php';
