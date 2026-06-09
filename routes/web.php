<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\ManagerAuthController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [HomeController::class, 'loginSelection']);

Route::get('/user/login', [UserAuthController::class, 'showLogin']);
Route::post('/user/login', [UserAuthController::class, 'login']);
Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/manager/login', [ManagerAuthController::class, 'showLogin']);
Route::post('/manager/login', [ManagerAuthController::class, 'login']);
Route::post('/manager/logout', [ManagerAuthController::class, 'logout'])->name('manager.logout');

Route::get('/user/dashboard', function () {
    return view('dashboards.user');
})->middleware('user');

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    
    // Users Management
    Route::get('/users', [\App\Http\Controllers\AdminController::class, 'usersIndex'])->name('users.index');
    Route::get('/users/create', [\App\Http\Controllers\AdminController::class, 'usersCreate'])->name('users.create');
    Route::post('/users', [\App\Http\Controllers\AdminController::class, 'usersStore'])->name('users.store');
    
    // Managers Management
    Route::get('/managers', [\App\Http\Controllers\AdminController::class, 'managersIndex'])->name('managers.index');
    Route::get('/managers/create', [\App\Http\Controllers\AdminController::class, 'managersCreate'])->name('managers.create');
    Route::post('/managers', [\App\Http\Controllers\AdminController::class, 'managersStore'])->name('managers.store');
    
    // Settings
    Route::get('/settings', [\App\Http\Controllers\AdminController::class, 'settings'])->name('settings');
});

Route::get('/manager/dashboard', function () {
    return view('dashboards.manager');
})->middleware('manager');