<?php

use Illuminate\Support\Facades\Route;

// Redirection accueil vers la première landing page
Route::get('/', function () {
    return redirect()->route('landing.edl');
});

require __DIR__ . '/landing.php';
require __DIR__ . '/admin.php';
