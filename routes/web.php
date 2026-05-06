<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProgramController;
use App\Http\Controllers\InstitusiController;
use App\Http\Controllers\AdminInstitusiController;
use App\Http\Controllers\AdminKursusController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StaffEventController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Admin only routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/event/{event}/report', [AdminDashboardController::class, 'eventReport'])->name('admin.event-report');
});

Route::get('/bmd', [StaffEventController::class, 'guestBmd'])->name('bmd');
Route::post('/bmd', [StaffEventController::class, 'storeGuestPelajar'])->name('bmd.store');

// Pelajar routes (public - no auth required)
Route::get('/pelajar/senarainama/{pelajar_id?}', [StaffEventController::class, 'pelajarSenaraiNama'])->name('pelajar.senarainama');
Route::get('/pelajar/dashboard/{pelajar}', [StaffEventController::class, 'pelajarDashboard'])->name('pelajar.dashboard');
Route::get('/pelajar/login/{pelajar_id}', [StaffEventController::class, 'pelajarLogin'])->name('pelajar.login');
Route::post('/pelajar/verify-ic', [StaffEventController::class, 'pelajarVerifyIc'])->name('pelajar.verify-ic');
Route::get('/pelajar/editbmd/{pelajar}', [StaffEventController::class, 'pelajarEditBmd'])->name('pelajar.editbmd');
Route::put('/pelajar/editbmd/{pelajar}', [StaffEventController::class, 'pelajarUpdateBmd'])->name('pelajar.updatebmd');
Route::get('/pelajar/welcome/{pelajar}', [StaffEventController::class, 'pelajarWelcome'])->name('pelajar.welcome');
Route::get('/pelajar/dashboard/{pelajar}', [StaffEventController::class, 'pelajarDashboard'])->name('pelajar.dashboard');
Route::get('/pelajar/program/{pelajar}', [StaffEventController::class, 'pelajarProgram'])->name('pelajar.program');
Route::get('/pelajar/program-list/{pelajar}', [StaffEventController::class, 'pelajarProgramList'])->name('pelajar.program-list');
Route::get('/pelajar/institusi/{pelajar}', [StaffEventController::class, 'pelajarInstitusi'])->name('pelajar.institusi');
Route::get('/pelajar/listkursus/{pelajar}/{nama}', [StaffEventController::class, 'pelajarListKursus'])->name('pelajar.listkursus');
Route::get('/pelajar/pilihankursus/{pelajar}/{nama}', [StaffEventController::class, 'pelajarPilihanKursus'])->name('pelajar.pilihankursus');
Route::get('/pelajar/filter/{pelajar}/{nama}', [StaffEventController::class, 'pelajarFilterByName'])->name('pelajar.filter');
Route::get('/pelajar/infoinstitusi/{pelajar}/{kod_institusi}', [StaffEventController::class, 'pelajarInfoInstitusi'])->name('pelajar.infoinstitusi');
Route::get('/pelajar/infokursus/{pelajar}/{kursus}', [StaffEventController::class, 'pelajarInfoKursus'])->name('pelajar.infokursus');
Route::get('/pelajar/tab/maklumat/{pelajar}/{kursus}', [StaffEventController::class, 'pelajarTabMaklumat'])->name('pelajar.tab.maklumat');
Route::get('/pelajar/tab/syarat/{pelajar}/{kursus}', [StaffEventController::class, 'pelajarTabSyarat'])->name('pelajar.tab.syarat');
Route::get('/pelajar/tab/silibus/{pelajar}/{kursus}', [StaffEventController::class, 'pelajarTabSilibus'])->name('pelajar.tab.silibus');
Route::get('/pelajar/tab/kerjaya/{pelajar}/{kursus}', [StaffEventController::class, 'pelajarTabKerjaya'])->name('pelajar.tab.kerjaya');
Route::get('/pelajar/tab/yuran/{pelajar}/{kursus}', [StaffEventController::class, 'pelajarTabYuran'])->name('pelajar.tab.yuran');
Route::get('/pelajar/tab/galeri/{pelajar}/{kursus}', [StaffEventController::class, 'pelajarTabGaleri'])->name('pelajar.tab.galeri');
Route::post('/pelajar/apply-now/{pelajar}', [StaffEventController::class, 'pelajarApplyNow'])->name('pelajar.apply-now');
Route::get('/pelajar/pembayaran/{pelajar}', [StaffEventController::class, 'pelajarPembayaran'])->name('pelajar.pembayaran');
Route::post('/pelajar/store-pembayaran/{pelajar}', [StaffEventController::class, 'pelajarStorePembayaran'])->name('pelajar.store-pembayaran');
Route::get('/pelajar/resit/{pelajar}', [StaffEventController::class, 'pelajarResit'])->name('pelajar.resit');
Route::get('/pelajar/surat-tawaran/{pelajar}', [StaffEventController::class, 'pelajarSuratTawaran'])->name('pelajar.surat-tawaran');
Route::get('/pelajar/download-surat-tawaran/{pelajar}', [StaffEventController::class, 'pelajarDownloadSuratTawaran'])->name('pelajar.download-surat-tawaran');
Route::post('/pelajar/send-email/{pelajar}', [StaffEventController::class, 'pelajarSendEmail'])->name('pelajar.send-email');
Route::get('/pelajar/complete/{pelajar}', [StaffEventController::class, 'pelajarComplete'])->name('pelajar.complete');
Route::post('/pelajar/logout', [StaffEventController::class, 'pelajarLogout'])->name('pelajar.logout');

// Staff only routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/staff/main', [StaffEventController::class, 'index'])->name('staff.main');
    Route::get('/staff/event/create', [StaffEventController::class, 'create'])->name('staff.event.create');
    Route::post('/staff/event', [StaffEventController::class, 'store'])->name('staff.event.store');
    Route::get('/staff/bmd/{pelajar}', [StaffEventController::class, 'editBmd'])->name('staff.bmd.edit');
    Route::put('/staff/bmd/{pelajar}', [StaffEventController::class, 'updatePelajar'])->name('staff.bmd.update');
    Route::get('/staff/bmd/{pelajar}/print', [StaffEventController::class, 'printBmd'])->name('staff.bmd.print');
    Route::get('/staff/bmd/{pelajar}/resit', [StaffEventController::class, 'staffResit'])->name('staff.bmd.resit');
    Route::post('/staff/bmd/send-email-resit', [StaffEventController::class, 'sendEmailResit'])->name('staff.bmd.send-email-resit');
    Route::post('/staff/payment/update-status', [StaffEventController::class, 'updatePaymentStatus'])->name('staff.payment.update-status');

    // Interview routes
    Route::prefix('/staff/temuduga/{pelajar}')->name('staff.temuduga.')->group(function () {
        Route::get('/', [InterviewController::class, 'welcome'])->name('welcome');
        Route::get('/program', [InterviewController::class, 'program'])->name('program');
        Route::get('/listkursus/{nama}', [InterviewController::class, 'listKursus'])->name('listkursus');
        Route::get('/pilihankursus/{nama}', [InterviewController::class, 'pilihanKursus'])->name('pilihankursus');
        Route::get('/filter/{nama}', [InterviewController::class, 'filterByName'])->name('filter');
        Route::get('/infoinstitusi/{kod_institusi}', [InterviewController::class, 'infoInstitusi'])->name('infoinstitusi');
        Route::get('/infokursus/{kod_institusi}/{kod_kursus}', [InterviewController::class, 'infoKursus'])->name('infokursus');
        Route::get('/tab/maklumat/{kod_kursus}', [InterviewController::class, 'tabMaklumat'])->name('tab.maklumat');
        Route::get('/tab/syarat/{kod_kursus}', [InterviewController::class, 'tabSyarat'])->name('tab.syarat');
        Route::get('/tab/silibus/{kod_kursus}', [InterviewController::class, 'tabSilibus'])->name('tab.silibus');
        Route::get('/tab/kerjaya/{kod_kursus}', [InterviewController::class, 'tabKerjaya'])->name('tab.kerjaya');
        Route::get('/tab/yuran/{kod_kursus}', [InterviewController::class, 'tabYuran'])->name('tab.yuran');
        Route::get('/tab/galeri/{kod_institusi}', [InterviewController::class, 'tabGaleri'])->name('tab.galeri');
        Route::post('/apply-now', [InterviewController::class, 'applyNow'])->name('apply-now');
        Route::get('/pembayaran', [InterviewController::class, 'pembayaran'])->name('pembayaran');
        Route::post('/store-pembayaran', [InterviewController::class, 'storePembayaran'])->name('store-pembayaran');
        Route::get('/resit', [InterviewController::class, 'resit'])->name('resit');
        Route::get('/surat-tawaran', [InterviewController::class, 'suratTawaran'])->name('surat-tawaran');
        Route::get('/download-surat-tawaran', [InterviewController::class, 'downloadSuratTawaran'])->name('download-surat-tawaran');
        Route::get('/complete', [InterviewController::class, 'complete'])->name('complete');
    });
});

Route::get('/receipt', function () {
    // Check if this is a modal request
    $isModal = request('modal');
    $pelajarId = request('pelajar_id');
    $pelajar = null;
    
    if ($pelajarId) {
        $pelajar = \App\Models\Pelajar::find($pelajarId);
    }
    
    // Return only the page content for modal, full HTML for standalone
    if ($isModal) {
        return view('receipt-content', compact('pelajar'));
    }
    
    return view('receipt', compact('pelajar'));
})->name('receipt');

Route::view('/about', 'about')->name('about');

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
    Route::get('/tabgaleri/{id}', [AdminkursusController::class, 'tabGaleri'])->name('admin.tabgaleri');
    Route::post('/galeri/store', [AdminkursusController::class, 'storeGaleri'])->name('admin.storegaleri');
    Route::delete('/galeri/{id}', [AdminkursusController::class, 'destroyGaleri'])->name('admin.destroygaleri');

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

Route::get('/kursus', [KursusController::class, 'index'])->name('kursus.index');
Route::get('/kursus/nama/{nama}', [KursusController::class, 'showByName'])->name('kursus.showByName');
Route::get('/kursus/nama/{nama}/filter', [KursusController::class, 'filterByName'])->name('kursus.filterByName');
Route::get('/kursus/{id}', [KursusController::class, 'show'])->name('kursus.show');
Route::get('/kursus/{id}/pdf', [KursusController::class, 'pdf'])->name('kursus.pdf');

Route::get('/kursus/tabmaklumat/{id}', [kursusController::class, 'tabMaklumat'])->name('kursus.tabmaklumat');
Route::get('/kursus/tabsyarat/{id}', [kursusController::class, 'tabSyarat'])->name('kursus.tabsyarat');
Route::get('/kursus/tabsilibus/{id}', [kursusController::class, 'tabSilibus'])->name('kursus.tabsilibus');
Route::get('/kursus/tabkerjaya/{id}', [kursusController::class, 'tabKerjaya'])->name('kursus.tabkerjaya');
Route::get('/kursus/tabyuran/{id}', [kursusController::class, 'tabYuran'])->name('kursus.tabyuran');
Route::get('/kursus/tabgaleri/{id}', [kursusController::class, 'tabGaleri'])->name('kursus.tabgaleri');

require __DIR__.'/auth.php';
