<?php

return [

    // TODO: remplacer par les vrais avis du client
    'reviews' => [
        ['name' => 'Sophie M.', 'stars' => 5, 'text' => 'Expert très professionnel, rapport détaillé reçu en 24h. Ma caution a été restituée intégralement grâce à l\'état des lieux d\'entrée.'],
        ['name' => 'Thomas R.', 'stars' => 5, 'text' => 'Intervention rapide et sérieuse. Le rapport avec photos m\'a permis d\'éviter une retenue abusive de 800€ sur ma caution.'],
        ['name' => 'Marie L.', 'stars' => 4, 'text' => 'Très bon service, l\'expert était ponctuel et minutieux. Je recommande pour tout état des lieux.'],
    ],

    // TODO: remplacer par les vraies FAQ du client
    'faqItems' => [
        ['question' => 'Combien coûte un état des lieux professionnel ?', 'answer' => 'Le tarif dépend de la surface et du type de logement. Demandez un devis gratuit en 2 minutes via notre formulaire pour obtenir un prix adapté à votre situation.'],
        ['question' => 'Quel est le délai d\'intervention ?', 'answer' => 'Nous intervenons sous 48h dans la plupart des cas. En cas d\'urgence, des interventions sous 24h sont possibles selon les disponibilités.'],
        ['question' => 'L\'état des lieux est-il conforme à la loi Alur ?', 'answer' => 'Oui, tous nos rapports sont conformes au décret du 30 mars 2016 relatif à la loi Alur. Ils incluent les mentions obligatoires, photos horodatées et descriptions détaillées.'],
        ['question' => 'Que se passe-t-il en cas de désaccord avec le propriétaire ?', 'answer' => 'En cas de désaccord, notre expert peut intervenir en tant que tiers de confiance pour un état des lieux contradictoire. Le rapport a valeur juridique.'],
        ['question' => 'Quelles zones géographiques couvrez-vous ?', 'answer' => 'Nous intervenons principalement sur Bordeaux et sa métropole, ainsi que sur l\'ensemble de la Gironde. Contactez-nous pour vérifier la couverture de votre secteur.'],
        ['question' => 'Dois-je être présent lors de l\'état des lieux ?', 'answer' => 'Oui, l\'état des lieux doit être réalisé en présence du locataire et du propriétaire (ou de leurs représentants). Notre expert se charge de la conduite et de la rédaction.'],
        ['question' => 'Le rapport inclut-il des photos ?', 'answer' => 'Oui, chaque rapport comprend des photos horodatées de l\'ensemble des pièces et équipements. C\'est un élément essentiel en cas de litige ultérieur.'],
        ['question' => 'Comment récupérer mon rapport après l\'intervention ?', 'answer' => 'Le rapport vous est envoyé par email au format PDF dans les 48h suivant l\'intervention. Un exemplaire est également remis au propriétaire.'],
    ],

    'schema' => [
        'types' => [
            [
                '@type' => 'LocalBusiness',
                'name' => "GEST'IMMO",
                'description' => 'État des lieux professionnel à domicile — experts certifiés, conforme loi Alur',
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
                'name' => 'État des Lieux Professionnel',
                'description' => "Réalisation d'états des lieux d'entrée et de sortie par un expert certifié",
                'provider' => ['@type' => 'LocalBusiness', 'name' => "GEST'IMMO"],
            ],
        ],
        'breadcrumbName' => 'État des Lieux Professionnel',
        'rating' => ['value' => '4.8', 'count' => '352'],
    ],

];
