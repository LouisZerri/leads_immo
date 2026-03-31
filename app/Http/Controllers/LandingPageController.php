<?php

namespace App\Http\Controllers;

class LandingPageController extends Controller
{
    public function etatDesLieux()
    {
        $data = config('pages.edl');
        $data['schemaJsonLd'] = $this->buildSchemaJsonLd($data);

        return view('pages.etat-des-lieux', $data);
    }

    public function litigeEdl()
    {
        $data = config('pages.litige');
        $data['schemaJsonLd'] = $this->buildSchemaJsonLd($data);

        return view('pages.application-edl', $data);
    }

    public function investissementLocatif()
    {
        $data = config('pages.investissement');
        $data['schemaJsonLd'] = $this->buildSchemaJsonLd($data);

        return view('pages.investissement-locatif', $data);
    }

    public function defiscalisation()
    {
        $data = config('pages.defiscalisation');
        $data['schemaJsonLd'] = $this->buildSchemaJsonLd($data);

        return view('pages.defiscalisation', $data);
    }

    public function merci()
    {
        return view('pages.merci');
    }

    private function buildSchemaJsonLd(array $data): string
    {
        $schema = $data['schema'];

        // Ajouter l'URL courante aux types qui ont un champ url
        $types = array_map(function ($type) {
            if (isset($type['address'])) {
                $type['url'] = url()->current();
            }
            return $type;
        }, $schema['types']);

        $faqEntities = array_map(fn($faq) => [
            '@type' => 'Question',
            'name' => $faq['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['answer'],
            ],
        ], $data['faqItems']);

        $graph = [
            ...$types,
            [
                '@type' => 'FAQPage',
                'mainEntity' => $faqEntities,
            ],
            [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => url('/')],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => $schema['breadcrumbName'], 'item' => url()->current()],
                ],
            ],
        ];

        // AggregateRating si présent dans la config
        if (isset($schema['rating'])) {
            $graph[] = [
                '@type' => 'AggregateRating',
                'itemReviewed' => [
                    '@type' => $types[0]['@type'] ?? 'Organization',
                    'name' => $types[0]['name'] ?? "GEST'IMMO",
                ],
                'ratingValue' => $schema['rating']['value'],
                'bestRating' => '5',
                'ratingCount' => $schema['rating']['count'],
            ];
        }

        return json_encode([
            '@context' => 'https://schema.org',
            '@graph' => $graph,
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_HEX_TAG | JSON_HEX_AMP);
    }
}
