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

Route::get('/admin/login', [AdminAuthController::class, 'showLogin']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);

Route::get('/manager/login', [ManagerAuthController::class, 'showLogin']);
Route::post('/manager/login', [ManagerAuthController::class, 'login']);

Route::get('/user/dashboard', function () {
    return view('dashboards.user');
})->middleware('role:user');

Route::get('/admin/dashboard', function () {
    return view('dashboards.admin');
})->middleware('role:admin');

Route::get('/manager/dashboard', function () {
    return view('dashboards.manager');
})->middleware('role:manager');