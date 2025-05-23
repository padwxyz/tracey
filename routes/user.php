<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.user.landing_page');
});

Route::get('/dashboard-user', function () {
    return view('pages.user.dashboard_user');
});

Route::get('/history-user', function () {
    return view('pages.user.history');
});

Route::get('/note-user', function () {
    return view('pages.user.note');
});