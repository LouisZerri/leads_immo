<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

// Landing pages
Route::get('/etat-des-lieux-professionnel', [LandingPageController::class, 'etatDesLieux'])->name('landing.edl');
Route::get('/litige-etat-des-lieux-recours-caution', [LandingPageController::class, 'litigeEdl'])->name('landing.litige');
Route::get('/investissement-locatif-rentable', [LandingPageController::class, 'investissementLocatif'])->name('landing.investissement');
Route::get('/defiscalisation-immobiliere-2025', [LandingPageController::class, 'defiscalisation'])->name('landing.defiscalisation');

// Page de confirmation
Route::get('/merci', [LandingPageController::class, 'merci'])->name('landing.merci');

// Soumission formulaire
Route::post('/lead', [LeadController::class, 'store'])->name('lead.store');
