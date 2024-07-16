<?php

use App\Http\Controllers\Backend\MediaController;
use App\Http\Controllers\Backend\User\PermissionController;
use App\Http\Controllers\Backend\User\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\StatusController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ProcessController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\SocialLinksController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/service/{id}', [ServiceController::class, 'details'])->name('service');
Route::get('/portfolios', [PortfolioController::class, 'portfolios'])->name('portfolio');
Route::get('/portfolios/{slug}', [PortfolioController::class, 'single_portfolio'])->name('single_portfolio');
Route::get('/portfolios/category/{slug}', [CategoryController::class, 'category_portfolio'])->name('portfolio_category');
Route::get('/about', [AboutController::class, 'show_front'])->name('about');
Route::post('/contact', [HomeController::class, 'contact'])->name('contact');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// ======================================= Routes for Admin Users =======================================
Route::middleware(['auth', 'verified'])->prefix('/dashboard')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

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
    Route::resource('/portfolios', PortfolioController::class);
    Route::get('/get_categories', [CategoryController::class, 'get_categories'])->name('get_categories');

    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about/page', [AboutController::class, 'about_page_update'])->name('about_page_update');
    Route::resource('/about/socials', SocialLinksController::class);
    Route::resource('/about/status', StatusController::class);

    // Routes for Contact Message
    Route::prefix('/contact')->controller(ContactController::class)->name('contact.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/details/{contact}', 'details')->name('details');
        Route::delete('/{contact}', 'destroy')->name('destroy');
        Route::get('/mark_all_read', 'mark_all_read')->name('mark_all_read');
        Route::get('/notification/{notificationId}', 'notificationMarkAsRead')->name('readNotify');
        Route::post('/delete_all_notifications', 'delete_all_notifications')->name('delete_all_notifications');
    });

    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::put('/roles_permissions/{role}', [RoleController::class, 'roles_permissions'])->name('roles_permissions');
    Route::resource('/permissions', PermissionController::class);
    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
    Route::post('/media/add', [MediaController::class, 'store'])->name('media.store');
    Route::delete('/media/delete', [MediaController::class, 'destroy'])->name('media.delete');
});