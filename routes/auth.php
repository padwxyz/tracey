<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard-user', function () {
//     return view('pages.user.dashboard_user');
// })->middleware('auth')->name('dashboard-user');

// Route::get('/dashboard-admin', function () {
//     return view('pages.admin.dashboard_admin');
// })->middleware('auth')->name('dashboard-admin');
