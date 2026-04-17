<?php

use App\Http\Controllers\CallbackController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadMagnetController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

$baseDomain = config('landing.base_domain');
$useSubdomains = config('landing.use_subdomains');

if ($useSubdomains) {
    // Production : chaque page sur son sous-domaine
    Route::domain('edl.' . $baseDomain)->group(function () {
        Route::get('/', [LandingPageController::class, 'etatDesLieux'])->name('landing.edl');
    });
    Route::domain('app.' . $baseDomain)->group(function () {
        Route::get('/', [LandingPageController::class, 'litigeEdl'])->name('landing.litige');
    });
    Route::domain('invest.' . $baseDomain)->group(function () {
        Route::get('/', [LandingPageController::class, 'investissementLocatif'])->name('landing.investissement');
    });
    Route::domain('defiscalisation.' . $baseDomain)->group(function () {
        Route::get('/', [LandingPageController::class, 'defiscalisation'])->name('landing.defiscalisation');
    });
} else {
    // Dev/local : accès via paths
    Route::get('/etat-des-lieux-professionnel', [LandingPageController::class, 'etatDesLieux'])->name('landing.edl');
    Route::get('/application-etat-des-lieux', [LandingPageController::class, 'litigeEdl'])->name('landing.litige');
    Route::get('/investissement-locatif-rentable', [LandingPageController::class, 'investissementLocatif'])->name('landing.investissement');
    Route::get('/defiscalisation-immobiliere', [LandingPageController::class, 'defiscalisation'])->name('landing.defiscalisation');
}

// Routes communes (disponibles sur tous les domaines)
Route::get('/merci', [LandingPageController::class, 'merci'])->name('landing.merci');
Route::get('/conditions-generales', fn () => view('pages.conditions-generales'))->name('landing.cgu');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Soumissions
Route::post('/lead', [LeadController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('lead.store');

Route::post('/callback', [CallbackController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('callback.store');

Route::post('/lead-magnet', [LeadMagnetController::class, 'send'])
    ->middleware('throttle:3,1')
    ->name('lead-magnet.send');
