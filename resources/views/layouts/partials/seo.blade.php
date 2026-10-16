@php
    $seoTitle = $title ?? 'Zahrat Al Madina | Fresh Fruits & Vegetables, Dubai';
    $seoDescription = $description ?? 'Premium-quality fruits and vegetables. Import, export and wholesale distribution from Al Aweer Central Market, Dubai, UAE.';
    $seoImage = $image ?? asset('images/og-image.jpg');
@endphp

<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<link rel="canonical" href="{{ url()->current() }}">
<meta name="robots" content="index, follow">

<meta property="og:type" content="website">
<meta property="og:site_name" content="Zahrat Al Madina">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta name="twitter:card" content="summary_large_image">

<script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => 'Zahrat Al Madina',
        'alternateName' => ['Zahrat Almadina', 'Zahrat Al Madina Fruits & Vegetables', 'زهرة المدينة'],
        'url' => url('/'),
        'logo' => asset('images/logo.svg'),
        'image' => asset('images/og-image.jpg'),
        'description' => 'Fruits and vegetables import, export and wholesale in Dubai, UAE.',
        'telephone' => '+971502528036',
        'email' => 'hr@zahratalmadinafruitsandveg.com',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Shop No 65, Block 2, Central Fruit & Vegetable Market, Al Aweer',
            'addressLocality' => 'Dubai',
            'addressCountry' => 'AE',
        ],
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
