<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

// Auth admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Dashboard protégé
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/leads/{lead}', [DashboardController::class, 'show'])->name('leads.show');
    Route::patch('/leads/{lead}/statut', [DashboardController::class, 'updateStatut'])->name('leads.statut');
    Route::get('/export', [DashboardController::class, 'export'])->name('leads.export');
});
