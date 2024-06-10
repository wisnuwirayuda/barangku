<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/officer', function () {
    return view('pages.officer.home');
})->name('officer.home');

Route::get('/officer/form', function () {
    return view('pages.officer.form');
})->name('officer.form');

Route::get('/manager', function () {
    return view('pages.manager.home');
})->name('manager.home');

Route::get('/manager/history', function () {
    return view('pages.manager.history');
})->name('manager.history');

Route::get('/finance', function () {
    return view('pages.finance.home');
})->name('finance.home');