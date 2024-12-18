<?php

use App\Http\Controllers\SiswaImportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use Illuminate\Auth\Middleware\Authenticate;


route::resource('siswa',SiswaController::class);
Route::post('siswaimport', SiswaImportController::class)->name('siswaimport.store');