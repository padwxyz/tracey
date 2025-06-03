<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.user.landing_page');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('dashboard');

Route::get('/note', [NoteController::class, 'index'])->name('note.index');
Route::post('/note', [NoteController::class, 'store'])->name('note.store');
Route::get('/facilities/{locationId}', [NoteController::class, 'getFacilities']);
Route::get('/items/{categoryId}', [NoteController::class, 'getItems']);

Route::get('/all-activity', [NoteController::class, 'allActivity'])->name('all-activity');
Route::get('/activity/{id}/details', [NoteController::class, 'showActivityDetails'])->name('activity-details');
Route::post('/activity/{id}/update', [NoteController::class, 'updateActivity'])->name('activity.update');

Route::get('/activity-by-category', [ActivityController::class, 'viewByCategory'])->name('activity-by-category');
Route::get('/activity-by-item', [ActivityController::class, 'viewByItem'])->name('activity-by-item');
Route::get('/activity-by-location', [ActivityController::class, 'viewByLocation'])->name('activity-by-location');

Route::get('/activity/filter', [ActivityController::class, 'filterActivity'])->name('activity.filter');

Route::get('/activity-by-status', [ActivityController::class, 'viewByStatus'])->name('activity-by-status');

Route::post('/note/{id}/add-comment', [NoteController::class, 'addComment'])->name('note.addComment');

Route::get('/history', [HistoryController::class, 'index'])->name('note.history');

Route::get('/log-status', [LogController::class, 'index'])->name('log-status');
