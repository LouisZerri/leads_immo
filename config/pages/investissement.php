<?php

return [

    // TODO: remplacer par les vrais avis du client
    'reviews' => [
        ['name' => 'Pierre K.', 'stars' => 5, 'text' => 'Grâce à leur accompagnement, j\'ai trouvé un T2 à Bordeaux avec un rendement net de 6,2%. Le simulateur m\'a permis de valider mon projet avant de me lancer.'],
        ['name' => 'Caroline F.', 'stars' => 5, 'text' => 'Premier investissement locatif, j\'étais perdue. L\'équipe m\'a guidée de A à Z. Mon bien est loué depuis le premier mois, cashflow positif.'],
        ['name' => 'Stéphane M.', 'stars' => 4, 'text' => 'Bon accompagnement, conseils pertinents sur le choix du régime fiscal. J\'ai opté pour le LMNP et j\'économise 3 200€/an d\'impôts.'],
    ],

    // TODO: remplacer par les vraies FAQ du client
    'faqItems' => [
        ['question' => 'Quel budget minimum pour un investissement locatif ?', 'answer' => 'Il est possible d\'investir à partir de 50 000€ dans certaines villes. À Bordeaux et sa métropole, comptez plutôt entre 80 000€ et 150 000€ pour un studio ou T2 bien placé avec un bon rendement.'],
        ['question' => 'Peut-on investir sans apport ?', 'answer' => 'Oui, de nombreuses banques financent des investissements locatifs à 110% (bien + frais de notaire) si le projet est solide et que le cashflow est positif ou neutre. Nous vous aidons à monter un dossier bancaire convaincant.'],
        ['question' => 'LMNP ou SCI, quel statut choisir ?', 'answer' => 'Le LMNP est idéal pour un premier investissement grâce à l\'amortissement du bien. La SCI à l\'IS est plus adaptée pour du patrimoine à long terme ou des investissements multiples. Nous analysons votre situation pour vous recommander le meilleur choix.'],
        ['question' => 'Quel rendement locatif viser ?', 'answer' => 'Un bon rendement brut se situe entre 5% et 8%. En net (après charges, vacance et fiscalité), visez au minimum 3% à 5%. Notre simulateur vous permet de calculer précisément votre rendement réel.'],
        ['question' => 'Comment calculer le cashflow d\'un investissement ?', 'answer' => 'Le cashflow = loyer mensuel - mensualité de crédit - charges (copropriété, taxe foncière, assurance, gestion). Un cashflow positif signifie que votre bien se rembourse tout seul et vous génère un revenu.'],
        ['question' => 'Qu\'est-ce que la vacance locative ?', 'answer' => 'C\'est la période pendant laquelle votre bien n\'est pas loué. On l\'estime généralement entre 1 et 2 mois par an selon l\'emplacement. Notre simulateur intègre cette donnée dans le calcul du rendement net.'],
        ['question' => 'Quels sont les frais à prévoir en plus du prix d\'achat ?', 'answer' => 'Comptez les frais de notaire (7-8% dans l\'ancien, 2-3% dans le neuf), les éventuels travaux de rénovation, les frais de dossier bancaire et l\'assurance emprunteur.'],
        ['question' => 'Combien de temps dure l\'accompagnement ?', 'answer' => 'De la recherche du bien à la mise en location, comptez en moyenne 1 à 3 mois. Nous restons disponibles après la mise en location pour toute question sur la gestion ou la fiscalité.'],
    ],

    'schema' => [
        'types' => [
            [
                '@type' => 'FinancialService',
                'name' => "GEST'IMMO — Investissement Locatif",
                'description' => 'Accompagnement en investissement locatif rentable — simulation, stratégie et mise en location',
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
        ],
        'breadcrumbName' => 'Investissement Locatif Rentable',
        'rating' => ['value' => '4.7', 'count' => '215'],
    ],

];
