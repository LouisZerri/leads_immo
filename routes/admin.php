<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/leads/{lead}', [DashboardController::class, 'show'])->name('leads.show');
    Route::patch('/leads/{lead}/statut', [DashboardController::class, 'updateStatut'])->name('leads.statut');
    Route::get('/export', [DashboardController::class, 'export'])->name('leads.export');
});
