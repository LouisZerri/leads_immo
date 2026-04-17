<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Landing Pages Subdomain Configuration
    |--------------------------------------------------------------------------
    |
    | Domain de base pour les landing pages. En prod, chaque page aura
    | son propre sous-domaine. En dev (localhost), on utilise les paths.
    |
    */

    'base_domain' => env('LANDING_BASE_DOMAIN', 'gestimmo-france.fr'),

    'use_subdomains' => env('LANDING_USE_SUBDOMAINS', false),

    'pages' => [
        'edl_pro' => [
            'subdomain' => 'edl',
            'path' => '/etat-des-lieux-professionnel',
        ],
        'application_edl' => [
            'subdomain' => 'app',
            'path' => '/application-etat-des-lieux',
        ],
        'investissement' => [
            'subdomain' => 'invest',
            'path' => '/investissement-locatif-rentable',
        ],
        'defiscalisation' => [
            'subdomain' => 'defiscalisation',
            'path' => '/defiscalisation-immobiliere',
        ],
    ],

];
