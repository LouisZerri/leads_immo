<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadMagnetController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// Landing pages
Route::get('/etat-des-lieux-professionnel', [LandingPageController::class, 'etatDesLieux'])->name('landing.edl');
Route::get('/application-etat-des-lieux', [LandingPageController::class, 'litigeEdl'])->name('landing.litige');
Route::get('/investissement-locatif-rentable', [LandingPageController::class, 'investissementLocatif'])->name('landing.investissement');
Route::get('/defiscalisation-immobiliere', [LandingPageController::class, 'defiscalisation'])->name('landing.defiscalisation');

// Page de confirmation
Route::get('/merci', [LandingPageController::class, 'merci'])->name('landing.merci');

// Pages légales
Route::get('/conditions-generales', fn () => view('pages.conditions-generales'))->name('landing.cgu');

// Soumission formulaire — max 5 requêtes/minute par IP
Route::post('/lead', [LeadController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('lead.store');

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Callback chatbot — max 5 requêtes/minute par IP
Route::post('/callback', [\App\Http\Controllers\CallbackController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('callback.store');

// Lead magnets — max 3 requêtes/minute par IP
Route::post('/lead-magnet', [LeadMagnetController::class, 'send'])
    ->middleware('throttle:3,1')
    ->name('lead-magnet.send');
