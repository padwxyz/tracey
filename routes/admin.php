<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\DashboardAdminController;

Route::get('/dashboard-admin', [DashboardAdminController::class, 'index'])->name('dashboard-admin');

Route::prefix('admin')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::put('admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
});

Route::prefix('user')->group(function () {
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
});

Route::prefix('location')->group(function () {
    Route::get('location', [LocationController::class, 'index'])->name('location.index');
    Route::post('location/store', [LocationController::class, 'store'])->name('location.store');
    Route::put('location/update/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('location/delete/{id}', [LocationController::class, 'delete'])->name('location.delete');
});

Route::prefix('category')->group(function () {
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
});

Route::prefix('item')->group(function () {
    Route::get('item', [ItemController::class, 'index'])->name('item.index');
    Route::post('item/store', [ItemController::class, 'store'])->name('item.store');
    Route::put('item/update/{id}', [ItemController::class, 'update'])->name('item.update');
    Route::delete('item/delete/{id}', [ItemController::class, 'delete'])->name('item.delete');
});

Route::prefix('note_data')->group(function () {
    Route::get('note_data', [NoteController::class, 'indexNote'])->name('note_data.index');
    Route::post('note_data/store', [NoteController::class, 'storeNote'])->name('note_data.store');
    Route::put('note_data/update/{id}', [NoteController::class, 'updateNote'])->name('note_data.update');
    Route::delete('note_data/delete/{id}', [NoteController::class, 'deleteNote'])->name('note_data.delete');
});
