<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ParticipantsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Models\ParticipantStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/datadiri', function () {
    return view('datadiri');
});

Route::post('/datadiri', function (Request $request) {
    $data = $request->all();
    dd($data);
})->name('datadiri');

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/dashboard', function () {
    $terima = ParticipantStudent::where('status', 'diterima')->count();
    $proses = ParticipantStudent::where('status', 'diproses')->count();
    $total = ParticipantStudent::count();
    return view('dashboard.dashboard', [
        'terima' => $terima,
        'proses' => $proses,
        'total' => $total,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Pendaftar
    Route::post('/pendaftar/create', [ParticipantsController::class, 'store'])->name('pendaftar.store');
    Route::post('/pendaftar/create-wali', [ParticipantsController::class, 'waliStore'])->name('wali.store');
    Route::post('/pendaftar/create-ijazah', [ParticipantsController::class, 'ijazahStore'])->name('ijazah.store');
    
    Route::prefix('admin')->middleware(['auth', 'role:Admin'])->group(function () {
        //Pendaftar
        Route::get('/pendaftar', [ParticipantsController::class, 'index'])->name('pendaftar');
        Route::post('/pendaftar/{id}/update-status-diterima', [ParticipantsController::class, 'updateStatusDiterima']);
        Route::post('/pendaftar/{id}/update-status-ditolak', [ParticipantsController::class, 'updateStatusDitolak']);
        Route::get('/pendaftar/{id}/edit', [ParticipantsController::class,'edit'])->name('pendaftar.edit');
        Route::get('/pendaftar/{id}/show', [ParticipantsController::class,'show'])->name('pendaftar.show');
        Route::put('/pendaftar/{id}', [ParticipantsController::class,'update'])->name('pendaftar.update');
        Route::delete('/pendaftar/{id}/delete', [ParticipantsController::class, 'destroy'])->name('pendaftar.destroy');
        // New
        // Route untuk cetak PDF detail pendaftar
        Route::get(
            '/dashboard/admin/pendaftar/{id}/cetak-pdf',
            [ParticipantsController::class, 'cetakPdf']
        )->name('pendaftar.cetak-pdf');
    });

    Route::prefix('siswa')->middleware(['auth', 'role:User'])->group(function () {
        Route::get('/pendaftaran/status', [SiswaController::class, 'index'])->name('siswa.status');
        Route::get('/pendaftaran/{id}/edit', [SiswaController::class,'edit'])->name('siswa.edit');
        Route::put('/pendaftaran/{id}', [SiswaController::class,'update'])->name('siswa.update');
        Route::put('/wali/{id}', [LandingController::class,'updateWali'])->name('wali.update');
    });
});

require __DIR__.'/auth.php';
