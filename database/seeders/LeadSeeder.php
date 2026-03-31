<?php

namespace Database\Seeders;

use App\Models\Lead;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        $pages = ['P1', 'P2', 'P3', 'P4'];
        $statuts = ['nouveau', 'contacte', 'converti', 'perdu'];
        $logements = ['studio', 't2', 't3', 't4+', 'maison'];
        $budgets = ['< 100k', '100-200k', '200-300k', '300k+'];
        $prenoms = ['Marie', 'Thomas', 'Sophie', 'Pierre', 'Julie', 'Nicolas', 'Camille', 'Alexandre', 'Laura', 'Julien', 'Emma', 'Lucas', 'Léa', 'Hugo', 'Manon', 'Antoine', 'Chloé', 'Maxime', 'Sarah', 'Romain'];

        for ($i = 0; $i < 50; $i++) {
            $page = $pages[array_rand($pages)];
            $prenom = $prenoms[array_rand($prenoms)];

            Lead::create([
                'page_source' => $page,
                'code_postal' => str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT),
                'selection' => in_array($page, ['P1', 'P2']) ? $logements[array_rand($logements)] : null,
                'budget_investissement' => in_array($page, ['P3', 'P4']) ? $budgets[array_rand($budgets)] : null,
                'prenom' => $prenom,
                'telephone' => '06' . str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'email' => strtolower($prenom) . rand(10, 99) . '@example.com',
                'consentement_rgpd' => true,
                'utm_source' => ['google', 'facebook', null][array_rand(['google', 'facebook', null])],
                'utm_medium' => ['cpc', 'social', null][array_rand(['cpc', 'social', null])],
                'utm_campaign' => ['edl_bordeaux', 'invest_2025', 'defiscalisation', null][array_rand(['edl_bordeaux', 'invest_2025', 'defiscalisation', null])],
                'ip_address' => rand(1, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.0',
                'statut' => $statuts[array_rand($statuts)],
                'created_at' => now()->subDays(rand(0, 30))->subHours(rand(0, 23)),
            ]);
        }
    }
}
