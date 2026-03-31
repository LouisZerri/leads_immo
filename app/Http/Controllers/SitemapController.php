<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [
            ['loc' => url('/etat-des-lieux-professionnel'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => url('/application-etat-des-lieux'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => url('/investissement-locatif-rentable'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => url('/defiscalisation-immobiliere'), 'priority' => '1.0', 'changefreq' => 'weekly'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $url) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$url['loc']}</loc>\n";
            $xml .= "    <lastmod>" . now()->format('Y-m-d') . "</lastmod>\n";
            $xml .= "    <changefreq>{$url['changefreq']}</changefreq>\n";
            $xml .= "    <priority>{$url['priority']}</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
