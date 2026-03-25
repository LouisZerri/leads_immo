<?php

return [

    // TODO: remplacer par les vrais avis du client
    'reviews' => [
        ['name' => 'Julien D.', 'stars' => 5, 'text' => 'Mon propriétaire retenait 1 200€ sur ma caution sans justificatif. Grâce à leur accompagnement, j\'ai récupéré la totalité en moins de 3 semaines.'],
        ['name' => 'Amandine B.', 'stars' => 5, 'text' => 'État des lieux de sortie contesté, on me reprochait des dégradations qui existaient à l\'entrée. Le dossier monté par l\'expert a tout réglé.'],
        ['name' => 'Marc P.', 'stars' => 5, 'text' => 'Réponse rapide, conseils clairs, et résultat concret. 950€ récupérés sur une retenue abusive. Je recommande à 100%.'],
    ],

    // TODO: remplacer par les vraies FAQ du client
    'faqItems' => [
        ['question' => 'Mon propriétaire retient ma caution sans justificatif, que faire ?', 'answer' => 'Le propriétaire a l\'obligation légale de justifier toute retenue sur le dépôt de garantie avec des factures ou devis. Sans justificatif, la retenue est abusive et vous pouvez la contester.'],
        ['question' => 'Quel est le délai légal de restitution de la caution ?', 'answer' => 'Le propriétaire dispose d\'1 mois pour restituer la caution si l\'état des lieux de sortie est conforme à celui d\'entrée, et de 2 mois en cas de différences. Au-delà, des pénalités de 10% par mois de retard s\'appliquent.'],
        ['question' => 'L\'état des lieux de sortie a été fait sans moi, est-il valable ?', 'answer' => 'Un état des lieux doit être contradictoire, c\'est-à-dire réalisé en présence des deux parties. Un état des lieux fait unilatéralement par le propriétaire peut être contesté.'],
        ['question' => 'Combien coûte une procédure de contestation ?', 'answer' => 'Notre analyse de dossier est gratuite. Selon la complexité du litige, nous vous orientons vers la solution la plus adaptée : lettre de mise en demeure, conciliation ou procédure judiciaire.'],
        ['question' => 'Puis-je contester un état des lieux signé ?', 'answer' => 'Oui, un état des lieux signé peut être contesté s\'il comporte des erreurs ou omissions manifestes, ou s\'il a été réalisé dans des conditions non conformes (mauvais éclairage, pression, etc.).'],
        ['question' => 'Que contient la lettre de mise en demeure ?', 'answer' => 'La lettre de mise en demeure rappelle au propriétaire ses obligations légales, détaille les retenues contestées et fixe un délai pour la restitution. C\'est souvent suffisant pour débloquer la situation.'],
        ['question' => 'Faut-il passer par un avocat ?', 'answer' => 'Pas nécessairement. La majorité des litiges se résolvent par une mise en demeure ou une conciliation. Nous ne faisons appel à un avocat que pour les cas les plus complexes ou les montants importants.'],
        ['question' => 'Quelle est la différence entre conciliation et procédure judiciaire ?', 'answer' => 'La conciliation est une démarche amiable gratuite via un conciliateur de justice. La procédure judiciaire passe par le tribunal et peut prendre plusieurs mois, mais elle est parfois nécessaire quand le propriétaire refuse tout dialogue.'],
    ],

    'schema' => [
        'types' => [
            [
                '@type' => 'LegalService',
                'name' => "GEST'IMMO — Litige État des Lieux",
                'description' => 'Accompagnement juridique pour litiges état des lieux et récupération de caution',
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
        'breadcrumbName' => 'Litige État des Lieux',
        'rating' => ['value' => '4.9', 'count' => '187'],
    ],

];
