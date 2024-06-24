<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProcessController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ServiceController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/service/{id}', [ServiceController::class, 'details'])->name('service');


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

    Route::prefix('/home')->name('home.')->controller(HomeController::class)->group(function () {
        Route::get('/banner', 'banner')->name('banner');
        Route::put('/banner', 'banner_update')->name('banner');

        Route::get('/welcome', 'welcome')->name('welcome');
        Route::put('/welcome', 'welcome_update')->name('welcome');

        Route::get('/service', 'service')->name('service');
        Route::put('/service', 'service_update')->name('service');
        Route::resource('/services', ServiceController::class);

        Route::get('/process', 'process')->name('process');
        Route::put('/process', 'process_update')->name('process');
        Route::resource('/processes', ProcessController::class);

        Route::get('/portfolio', 'portfolio')->name('portfolio');
        Route::put('/portfolio', 'portfolio_update')->name('portfolio');

    });

    Route::resource('/categories', CategoryController::class);

});