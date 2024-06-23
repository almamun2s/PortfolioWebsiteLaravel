<?php

use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// ======================================= Routes for Admin Users =======================================
Route::middleware(['auth', 'verified'])->prefix('/dashboard')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/home/banner', [HomeController::class, 'banner'])->name('home.banner');
    Route::put('/home/banner', [HomeController::class, 'banner_update'])->name('home.banner');
});