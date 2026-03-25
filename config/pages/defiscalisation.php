<?php

return [

    // TODO: remplacer par les vrais avis du client
    'reviews' => [
        ['name' => 'Laurent G.', 'stars' => 5, 'text' => 'TMI à 41%, je cherchais une solution pour réduire mes impôts. Grâce à leur conseil, j\'ai investi en LMNP et j\'économise plus de 5 000€/an. Résultat concret et rapide.'],
        ['name' => 'Nathalie R.', 'stars' => 5, 'text' => 'L\'audit fiscal m\'a ouvert les yeux sur les dispositifs auxquels j\'avais droit. Déficit foncier + travaux déductibles = 8 200€ d\'économie la première année.'],
        ['name' => 'François D.', 'stars' => 4, 'text' => 'Bon accompagnement sur la création de ma SCI à l\'IS. Les explications étaient claires, le montage fiscal solide. Je recommande pour les profils à forte imposition.'],
    ],

    // TODO: remplacer par les vraies FAQ du client
    'faqItems' => [
        ['question' => 'Qu\'est-ce que la défiscalisation immobilière ?', 'answer' => 'C\'est l\'ensemble des mécanismes légaux qui permettent de réduire votre impôt sur le revenu grâce à un investissement immobilier : LMNP, déficit foncier, SCI à l\'IS, loi Malraux, etc.'],
        ['question' => 'Quel dispositif est le plus adapté à ma situation ?', 'answer' => 'Cela dépend de votre TMI, de vos revenus fonciers existants, de votre horizon d\'investissement et de vos objectifs. Notre audit fiscal gratuit analyse ces paramètres pour vous recommander la meilleure stratégie.'],
        ['question' => 'Combien puis-je économiser en impôts ?', 'answer' => 'Les économies varient selon le dispositif et votre situation. En LMNP, l\'amortissement peut effacer la quasi-totalité de vos revenus locatifs. En déficit foncier, vous pouvez déduire jusqu\'à 10 700€/an de votre revenu global.'],
        ['question' => 'Le LMNP est-il toujours intéressant en ' . date('Y') . ' ?', 'answer' => 'Oui, le statut LMNP reste l\'un des dispositifs les plus avantageux. L\'amortissement du bien et du mobilier permet de générer des revenus locatifs peu ou pas imposés pendant de nombreuses années.'],
        ['question' => 'Qu\'est-ce que le déficit foncier ?', 'answer' => 'Le déficit foncier se crée lorsque vos charges (travaux, intérêts d\'emprunt, gestion) dépassent vos loyers. Ce déficit est déductible de votre revenu global jusqu\'à 10 700€/an, réduisant directement votre impôt.'],
        ['question' => 'SCI à l\'IS ou LMNP, que choisir ?', 'answer' => 'Le LMNP est plus simple et idéal pour 1 à 2 biens. La SCI à l\'IS est pertinente pour du patrimoine important, avec un taux d\'imposition de 15% sur les bénéfices jusqu\'à 42 500€ et la possibilité d\'amortir le bien.'],
        ['question' => 'L\'audit fiscal est-il vraiment gratuit ?', 'answer' => 'Oui, l\'audit est 100% gratuit et sans engagement. Vous répondez à 5 questions, et nous vous envoyons une estimation personnalisée de vos économies potentielles sous 48h.'],
        ['question' => 'Dois-je investir avant le 31 décembre pour en bénéficier cette année ?', 'answer' => 'Pour que la défiscalisation s\'applique sur l\'année en cours, l\'investissement doit être réalisé (acte signé) avant le 31 décembre. Plus vous agissez tôt, plus vous sécurisez l\'avantage fiscal.'],
    ],

    'schema' => [
        'types' => [
            [
                '@type' => 'FinancialService',
                'name' => "GEST'IMMO — Défiscalisation Immobilière",
                'description' => 'Conseil en défiscalisation immobilière — LMNP, déficit foncier, SCI IS, audit fiscal personnalisé',
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
        'breadcrumbName' => 'Défiscalisation Immobilière ' . date('Y'),
        'rating' => ['value' => '4.8', 'count' => '143'],
    ],

];
