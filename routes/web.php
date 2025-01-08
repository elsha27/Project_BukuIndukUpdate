<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaImportController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SkGuruController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class,'dashboard']);
    Route::get('/admin/guru', [GuruController::class,'index'])->name('guru.index');
    Route::get('/admin/guru/create', [GuruController::class,'create'])->name('guru.create');
    Route::post('/admin/guru', [GuruController::class,'store'])->name('guru.store');
    Route::get('/admin/guru/{id}/show', [GuruController::class,'show'])->name('guru.show');
    Route::get('guru/foto/{id}', [GuruController::class, 'showFoto'])->name('guru.foto');
    Route::get('/admin/guru/{id}/edit', [GuruController::class,'edit'])->name('guru.edit');
    Route::put('/admin/guru/{id}', [GuruController::class,'update'])->name('guru.update');
    Route::delete('/admin/guru/{id}', [GuruController::class,'destroy'])->name('guru.destroy');

    Route::get('/admin/siswa', [SiswaController::class,'index'])->name('siswa.index');
    Route::get('/admin/siswa/create', [SiswaController::class,'create'])->name('siswa.create');
    Route::post('/admin/siswa', [SiswaController::class,'store'])->name('siswa.store');
    Route::get('/admin/siswa/{id}/show', [SiswaController::class,'show'])->name('siswa.show');
    Route::get('/admin/siswa/{id}/edit', [SiswaController::class,'edit'])->name('siswa.edit');
    Route::put('/admin/siswa/{id}', [SiswaController::class,'update'])->name('siswa.update');
    Route::delete('/admin/siswa/{id}', [SiswaController::class,'destroy'])->name('siswa.destroy');
    // Route::post('siswaimport', [SiswaImportController::class, 'store'])->name('siswaimport.store');

    Route::get('/admin/rombel', [RombelController::class,'index'])->name('rombel.index');
    Route::get('/admin/rombel/create', [RombelController::class,'create'])->name('rombel.create');
    Route::post('/admin/rombel', [RombelController::class,'store'])->name('rombel.store');
    Route::get('/admin/rombel/{id}/show', [RombelController::class,'show'])->name('rombel.show');
    Route::get('/admin/rombel/{id}/edit', [RombelController::class,'edit'])->name('rombel.edit');
    Route::put('/admin/rombel/{id}', [RombelController::class,'update'])->name('rombel.update');
    Route::delete('/admin/rombel/{id}', [RombelController::class,'destroy'])->name('rombel.destroy');
});

Route::middleware(['auth','role:user'])->group(function(){
    Route::get('/user/dashboard', [UserController::class,'dashboard']);
    Route::get('/user/siswa', [SiswaController::class,'index'])->name('siswa.index');
    Route::get('/user/siswa/{id}/show', [SiswaController::class,'show'])->name('siswa.show');
    Route::get('/user/siswa/{id}/edit', [SiswaController::class,'edit'])->name('siswa.edit');
    Route::put('/user/siswa/{id}', [SiswaController::class,'update'])->name('siswa.update');

    Route::get('/user/rombel', [RombelController::class,'index'])->name('rombel.index');
    Route::get('/user/rombel/{id}/show', [RombelController::class,'show'])->name('rombel.show');

    Route::get('/user/guru/show', [GuruController::class, 'showUser'])->name('guru.showUser');
    Route::get('/user/guru/create', [GuruController::class,'create'])->name('guru.create');
    Route::post('/user/guru', [GuruController::class,'store'])->name('guru.store');
    Route::get('/user/guru/{id}/edit', [GuruController::class,'edit'])->name('guru.edit');
    Route::put('/user/guru/{id}', [GuruController::class,'update'])->name('guru.update');

    Route::get('/user/guru/createSK', [SkGuruController::class,'create'])->name('sk.create');
    Route::post('/user/guru/createSK', [SkGuruController::class,'store'])->name('sk.store');
    Route::delete('/user/guru/{id}', [SkGuruController::class,'destroy'])->name('sk.destroy');
});

// routes/web.php
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
