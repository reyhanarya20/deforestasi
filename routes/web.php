<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\NtlController;
use App\Http\Controllers\Dashboard\GFCController;
use App\Http\Controllers\Dashboard\MyprofileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboardGFC', [GFCController::class, 'index'])->name('gfcdashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/myprofile', [MyprofileController::class, 'update'])->name('myprofile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboardNTL', [NtlController::class, 'index'])->name('ntldashboard');
    Route::get('/dashboardNTL/search/kabupaten/{name}', [NtlController::class, 'searchDistrict'])->name('search-district-ntl');
    Route::get('/dashboardNTL/search/provinsi/{name}', [NtlController::class, 'searchProvince'])->name('search-province-ntl');
    Route::get('/dashboardGFC/search/provinsi/{name}', [GfcController::class, 'searchProvince'])->name('search-province-gfc');
    Route::get('/dashboardGFC/search/year/{year}', [GfcController::class, 'searchYear'])->name('search-year-gfc');
    Route::get('/myprofile', [MyprofileController::class, 'index'])->name('myprofile');
});

require __DIR__.'/auth.php';
