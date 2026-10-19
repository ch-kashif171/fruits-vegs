<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $pages = [
            ['url' => url('/'),                           'priority' => '1.0', 'changefreq' => 'weekly'],
            ['url' => url('/fruits-and-vegetables'),      'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => url('/services'),                   'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => url('/about'),                      'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => url('/contact'),                    'priority' => '0.7', 'changefreq' => 'monthly'],
        ];

        $xml = view('sitemap', compact('pages'))->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
