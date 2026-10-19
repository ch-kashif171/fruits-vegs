@php
    /* ─── Core meta ─────────────────────────────────────────────────────── */
    $seoTitle       = $title       ?? null;
    $seoDescription = $description ?? null;
    $seoImage       = $image       ?? asset('images/og-image.jpg');
    $pageSlug       = $pageSlug    ?? null;

    $siteName = 'Zahrat Al Madina Fruits & Vegetables';
    $tagline  = 'Fresh Fruits & Vegetables, Dubai – UAE';

    $defaultTitle       = "{$siteName} | {$tagline}";
    $defaultDescription = 'Premium-quality fruits and vegetables. Import, export and wholesale distribution from Al Aweer Central Market, Dubai, UAE.';

    /* Page-specific fallbacks */
    $pageTitles = [
        'home'                  => $defaultTitle,
        'about'                 => "About Us | {$siteName} – Dubai Wholesale Produce",
        'services'              => "Our Services | {$siteName} – Import, Export & Wholesale",
        'fruits-and-vegetables' => "Fresh Fruits & Vegetables | {$siteName} – Dubai",
        'contact'               => "Contact Us | {$siteName} – Al Aweer Market, Dubai",
    ];

    $pageDescriptions = [
        'home'                  => $defaultDescription,
        'about'                 => 'Learn about Zahrat Al Madina Fruits & Vegetables – a leading fresh produce supplier based at Al Aweer Central Market, Dubai, UAE. Our mission, vision and values.',
        'services'              => 'We provide fresh produce import, export and wholesale distribution services to supermarkets, hotels and distributors across the UAE and globally.',
        'fruits-and-vegetables' => 'Browse our full range of fresh fruits and vegetables – seasonal, exotic and everyday produce sourced from trusted farms worldwide. Available for wholesale and export.',
        'contact'               => 'Contact Zahrat Al Madina at Shop 65, Block 2, Al Aweer Central Market, Dubai. Reach our sales team by phone or email for wholesale enquiries.',
    ];

    $resolvedTitle       = $seoTitle       ?? ($pageTitles[$pageSlug]       ?? $defaultTitle);
    $resolvedDescription = $seoDescription ?? ($pageDescriptions[$pageSlug] ?? $defaultDescription);

    /* ─── Business data (shared) ─────────────────────────────────────────── */
    $businessSchema = [
        '@context'      => 'https://schema.org',
        '@type'         => 'LocalBusiness',
        '@id'           => url('/') . '#business',
        'name'          => $siteName,
        'alternateName' => ['Zahrat Almadina', 'Zahrat Al-Madina', 'زهرة المدينة'],
        'url'           => url('/'),
        'logo'          => asset('images/logo.svg'),
        'image'         => asset('images/og-image.jpg'),
        'description'   => $defaultDescription,
        'telephone'     => '+971502528036',
        'email'         => 'info@zahratalmadinafruitsandveg.com',
        'priceRange'    => '$$',
        'currenciesAccepted' => 'AED, USD',
        'paymentAccepted'    => 'Cash, Bank Transfer',
        'address' => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Shop No 65, Block 2, Central Fruit & Vegetable Market, Al Aweer',
            'addressLocality' => 'Dubai',
            'addressRegion'   => 'Dubai',
            'addressCountry'  => 'AE',
        ],
        'geo' => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => 25.1845,
            'longitude' => 55.3644,
        ],
        'openingHoursSpecification' => [
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens'     => '08:00',
                'closes'    => '22:00',
            ],
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Saturday'],
                'opens'     => '10:00',
                'closes'    => '15:00',
            ],
        ],
        'sameAs' => [
            'https://www.facebook.com/',
            'https://www.instagram.com/',
        ],
        'areaServed' => [
            ['@type' => 'Country', 'name' => 'United Arab Emirates'],
            ['@type' => 'AdministrativeArea', 'name' => 'Dubai'],
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name'  => 'Fresh Produce',
            'itemListElement' => [
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Product', 'name' => 'Fresh Fruits']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Product', 'name' => 'Fresh Vegetables']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Product', 'name' => 'Wholesale Produce']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Product', 'name' => 'Import & Export']],
            ],
        ],
    ];

    /* ─── WebPage schema (per page) ──────────────────────────────────────── */
    $webPageSchema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'WebPage',
        '@id'         => url()->current() . '#webpage',
        'url'         => url()->current(),
        'name'        => $resolvedTitle,
        'description' => $resolvedDescription,
        'isPartOf'    => ['@id' => url('/') . '#website'],
        'about'       => ['@id' => url('/') . '#business'],
        'inLanguage'  => 'en',
    ];

    /* ─── BreadcrumbList (per page) ──────────────────────────────────────── */
    $breadcrumbItems = [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
    ];

    $breadcrumbLabels = [
        'about'                 => 'About Us',
        'services'              => 'Services',
        'fruits-and-vegetables' => 'Fruits & Vegetables',
        'contact'               => 'Contact',
    ];

    if ($pageSlug && $pageSlug !== 'home' && isset($breadcrumbLabels[$pageSlug])) {
        $breadcrumbItems[] = [
            '@type'    => 'ListItem',
            'position' => 2,
            'name'     => $breadcrumbLabels[$pageSlug],
            'item'     => url()->current(),
        ];
    }

    $breadcrumbSchema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => $breadcrumbItems,
    ];

    /* ─── WebSite schema (only on home) ─────────────────────────────────── */
    $websiteSchema = ($pageSlug === 'home' || $pageSlug === null) ? [
        '@context'        => 'https://schema.org',
        '@type'           => 'WebSite',
        '@id'             => url('/') . '#website',
        'url'             => url('/'),
        'name'            => $siteName,
        'description'     => $defaultDescription,
        'publisher'       => ['@id' => url('/') . '#business'],
        'inLanguage'      => 'en',
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => url('/fruits-and-vegetables') . '?q={search_term_string}',
            'query-input' => 'required name=search_term_string',
        ],
    ] : null;

    /* ─── FAQPage schema (services page) ─────────────────────────────────── */
    $faqSchema = ($pageSlug === 'services') ? [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => [
            [
                '@type'          => 'Question',
                'name'           => 'Where do you source your produce from?',
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We source from trusted agricultural hubs across the globe to ensure the highest quality and year-round availability.'],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'Do you offer wholesale pricing?',
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes, we offer competitive wholesale pricing for supermarkets, hotels, restaurants, and other B2B clients.'],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'Can I make custom orders?',
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Absolutely. We can accommodate custom volumes and specific produce requirements based on seasonal availability.'],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'How do you keep produce fresh during delivery?',
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We use advanced temperature-controlled logistics and strict grading procedures from farm to final delivery.'],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'How can I contact you for bulk orders?',
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'You can call us at +971502528036 or email info@zahratalmadinafruitsandveg.com to discuss your requirements.'],
            ],
        ],
    ] : null;
@endphp

{{-- ═══ Primary meta tags ═══════════════════════════════════════════════════ --}}
<title>{{ $resolvedTitle }}</title>
<meta name="description" content="{{ $resolvedDescription }}">
<meta name="keywords" content="fresh fruits vegetables Dubai, wholesale produce UAE, import export fruits Dubai, Al Aweer market, Zahrat Al Madina, fresh produce supplier Dubai, vegetable wholesale Dubai, fruit importer UAE">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="author" content="{{ $siteName }}">
<link rel="canonical" href="{{ url()->current() }}">

{{-- ═══ Open Graph ════════════════════════════════════════════════════════════ --}}
<meta property="og:type" content="{{ $pageSlug === 'home' ? 'website' : 'article' }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:title" content="{{ $resolvedTitle }}">
<meta property="og:description" content="{{ $resolvedDescription }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $siteName }} – Fresh Produce Dubai">
<meta property="og:locale" content="en_AE">

{{-- ═══ Twitter / X Card ══════════════════════════════════════════════════════ --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $resolvedTitle }}">
<meta name="twitter:description" content="{{ $resolvedDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">
<meta name="twitter:image:alt" content="{{ $siteName }}">

{{-- ═══ Geo / Local ═══════════════════════════════════════════════════════════ --}}
<meta name="geo.region" content="AE-DU">
<meta name="geo.placename" content="Dubai, United Arab Emirates">
<meta name="geo.position" content="25.1845;55.3644">
<meta name="ICBM" content="25.1845, 55.3644">

{{-- ═══ JSON-LD Structured Data ════════════════════════════════════════════════ --}}
<script type="application/ld+json">{!! json_encode($businessSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
<script type="application/ld+json">{!! json_encode($webPageSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>

@if($websiteSchema)
<script type="application/ld+json">{!! json_encode($websiteSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
@endif

@if($faqSchema)
<script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
@endif
