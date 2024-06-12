<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Officer\OfficerController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Finance\FinanceController;

Route::get('/', [LoginController::class, 'show'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('officer', [OfficerController::class, "show"])->name('officer.home');
    Route::get('officer/form', [OfficerController::class, "showForm"])->name('officer.form');
    Route::post('form', [OfficerController::class, "create"])->name('officer.create.form');
    Route::get('edit/{id}', [OfficerController::class, "edit"])->name('officer.edit');
    Route::put('updateForm/{id}', [OfficerController::class, "updateForm"])->name('officer.update');
    Route::delete('delete/{id}', [OfficerController::class, "delete"])->name('officer.delete');

    Route::get('manager', [ManagerController::class, "show"])->name('manager.home');
    Route::get('manager/history', [ManagerController::class, "history"])->name('manager.history');
    Route::put('update/{id}', [ManagerController::class, "update"])->name('manager.update');

    Route::get('finance', [FinanceController::class, "show"])->name('finance.home');
    Route::put('update/{id}', [FinanceController::class, "update"])->name('finance.update');
});