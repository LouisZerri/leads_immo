<?php

return [

    'reviews' => [],

    'faqItems' => [
        ['question' => 'Vos rapports sont-ils opposables en cas de litige ?', 'answer' => 'Oui. Tous nos EDL sont conformes au décret n°2016-382 du 30 mars 2016 et à la loi ALUR. Photos horodatées, géolocalisées, rapport signé électroniquement. Reconnus par les juridictions civiles et les commissions départementales de conciliation.'],
        ['question' => 'Que se passe-t-il si le locataire conteste l\'EDL à la sortie ?', 'answer' => 'Sur demande, nous pouvons réaliser une contre-visite pour clarifier les points contestés. Notre opérateur intervient comme tiers de confiance et fournit un complément de constat.'],
        ['question' => 'Quels délais pour les grandes surfaces ou maisons ?', 'answer' => '48h pour les biens jusqu\'à 120 m². 72h pour les maisons individuelles ou biens supérieurs à 120 m². Une option urgence est disponible (+30% sur le tarif) pour les délais inférieurs à 24h.'],
        ['question' => 'Acceptez-vous la facturation mensuelle groupée ?', 'answer' => 'Oui, c\'est notre format standard pour les agences. Une seule facture éditée le 1er du mois suivant, récapitulant chaque EDL réalisé. Paiement à 30 jours par virement.'],
        ['question' => 'Mes négociateurs peuvent-ils être présents lors de l\'EDL ?', 'answer' => 'Bien sûr, sur simple demande. Mais la majorité de nos agences clientes préfèrent libérer totalement leurs équipes commerciales — c\'est tout l\'intérêt de l\'externalisation.'],
        ['question' => 'Quelle est votre zone d\'intervention ?', 'answer' => 'Île-de-France, prioritairement Seine-et-Marne (77), Seine-Saint-Denis (93), Val-de-Marne (94) et Est parisien. Pour les autres départements, nous consulter.'],
        ['question' => 'Y a-t-il un engagement de durée ?', 'answer' => 'Aucun engagement de durée, quel que soit le volume mensuel. Vous arrêtez quand vous le souhaitez avec un préavis simple de 30 jours.'],
        ['question' => 'Comment puis-je tester sans risque ?', 'answer' => 'Vous pouvez démarrer avec un seul EDL pour évaluer notre qualité, puis monter en volume. Nous proposons aussi un EDL test gratuit pour les agences qui souhaitent juger sur pièce avant toute facturation.'],
    ],

    'schema' => [
        'types' => [
            [
                '@type' => 'LocalBusiness',
                'name' => "GEST'IMMO Pro",
                'description' => 'EDL externalisé pour agences immobilières en Île-de-France — conformité ALUR, intervention 48h',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => '30 Rue Joseph Bonnet',
                    'addressLocality' => 'Bordeaux',
                    'postalCode' => '33100',
                    'addressCountry' => 'FR',
                ],
                'telephone' => '+33649505250',
                'email' => 'contact@gestimmo-presta.fr',
            ],
            [
                '@type' => 'Service',
                'name' => 'État des Lieux Externalisé pour Agences',
                'description' => "Réalisation d'états des lieux d'entrée et de sortie pour agences immobilières",
                'provider' => ['@type' => 'LocalBusiness', 'name' => "GEST'IMMO Pro"],
            ],
        ],
        'breadcrumbName' => 'EDL Externalisé Agences',
        'rating' => ['value' => '4.8', 'count' => '52'],
    ],

];
