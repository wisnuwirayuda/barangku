<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [LoginController::class, 'show'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('officer', function () {
    return view('pages.officer.home');
})->name('officer.home');

Route::get('officer/form', function () {
    return view('pages.officer.form');
})->name('officer.form');

Route::get('manager', function () {
    return view('pages.manager.home');
})->name('manager.home');

Route::get('manager/history', function () {
    return view('pages.manager.history');
})->name('manager.history');

Route::get('finance', function () {
    return view('pages.finance.home');
})->name('finance.home');