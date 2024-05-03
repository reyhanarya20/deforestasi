<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\NtlController;
use App\Http\Controllers\Dashboard\GFCController;
use App\Http\Controllers\Dashboard\MyprofileController;

Route::get('/', [AuthenticatedSessionController::class, 'create'])
->name('login');

Route::get('/dashboardGFC', [GFCController::class, 'index'])->name('gfcdashboard')->middleware(['auth', 'verified']);
Route::post('api/fetch-cities', [NtlController::class, 'fetchCity']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/myprofile', [MyprofileController::class, 'update'])->name('myprofile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboardNTL', [NtlController::class, 'index'])->name('ntldashboard');
    Route::get('/dashboardGFC/filter', [GfcController::class, 'filter'])->name('filter-gfc');
    Route::get('/dashboardNTL/filter', [NtlController::class, 'filter'])->name('filter-ntl');

    Route::get('/myprofile', [MyprofileController::class, 'index'])->name('myprofile');
});

require __DIR__.'/auth.php';
