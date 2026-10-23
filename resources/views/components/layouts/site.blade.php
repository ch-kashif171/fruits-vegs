@props([
    'page' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.partials.seo', [
        'title'       => $page->title ?? null,
        'description' => $page->meta_description ?? null,
        'image'       => $page->hero_image ? asset($page->hero_image) : null,
        'pageSlug'    => $page->slug ?? null,
    ])

<!-- Favicon for Standard Browsers -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">

    <!-- Favicon for Google Search & Android -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('android-chrome-512x512.png') }}">

    <!-- Favicon for Apple Devices -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('site/css/custom.css')}}">
</head>
<body class="bg-white text-ink overflow-x-hidden">
    <header class="absolute inset-x-0 top-0 z-20 py-4 sm:py-5">
        <div class="wrap flex items-center justify-between gap-4 sm:gap-6">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 text-white no-underline hover:opacity-90 min-w-0">
                <img src="{{ asset($logoPath) }}" alt="{{ $siteName }} logo" width="56" height="56" class="size-12 sm:size-14 md:size-16 rounded-full bg-white p-0.5 shadow-[0_0_0_3px_rgba(255,255,255,.25)] shrink-0">
                <span class="flex flex-col leading-tight min-w-0">
                    <strong class="font-serif text-lg sm:text-xl truncate">{{ $siteName }}</strong>
                    <span class="hidden text-[0.70rem] tracking-[0.14em] uppercase opacity-85 sm:block truncate">{{ $tagline }}</span>
                </span>
            </a>

            <input type="checkbox" id="nav-toggle" class="peer sr-only">
            <label for="nav-toggle" class="z-30 grid cursor-pointer gap-1.5 p-2 lg:hidden shrink-0" aria-label="Toggle navigation">
                <span class="block h-0.5 w-6 bg-white transition-all"></span>
                <span class="block h-0.5 w-6 bg-white transition-all"></span>
                <span class="block h-0.5 w-6 bg-white transition-all"></span>
            </label>

            <!-- Backdrop for mobile drawer -->
            <label for="nav-toggle" class="fixed inset-0 bg-black/60 z-24 hidden peer-checked:block lg:peer-checked:hidden cursor-pointer backdrop-blur-xs transition-opacity" aria-hidden="true"></label>

            <nav class="fixed inset-y-0 right-0 z-[25] flex w-[min(320px,85vw)] max-w-full translate-x-full flex-col items-start justify-start gap-5 bg-forest p-6 sm:p-8 text-white transition-transform duration-300 ease-in-out overflow-y-auto peer-checked:translate-x-0 lg:static lg:flex lg:w-auto lg:translate-x-0 lg:flex-row lg:items-center lg:gap-8 lg:bg-transparent lg:p-0 lg:overflow-visible">
                <div class="w-full flex items-center justify-between pb-3 border-b border-white/15 lg:hidden">
                    <span class="font-serif text-lg font-bold text-white">Menu</span>
                    <label for="nav-toggle" class="cursor-pointer p-1 text-white/80 hover:text-white" aria-label="Close menu">
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </label>
                </div>
                <a href="{{ route('home') }}" @class(['border-b-2 pb-1 font-medium hover:border-white/60 transition-colors', 'border-orange text-orange' => request()->routeIs('home'), 'border-transparent text-white' => ! request()->routeIs('home')])>Home</a>
                <a href="{{ route('produce') }}" @class(['border-b-2 pb-1 font-medium hover:border-white/60 transition-colors', 'border-orange text-orange' => request()->routeIs('produce'), 'border-transparent text-white' => ! request()->routeIs('produce')])>Fruits &amp; Veg</a>
                <a href="{{ route('about') }}" @class(['border-b-2 pb-1 font-medium hover:border-white/60 transition-colors', 'border-orange text-orange' => request()->routeIs('about'), 'border-transparent text-white' => ! request()->routeIs('about')])>About</a>
                <a href="{{ route('services') }}" @class(['border-b-2 pb-1 font-medium hover:border-white/60 transition-colors', 'border-orange text-orange' => request()->routeIs('services'), 'border-transparent text-white' => ! request()->routeIs('services')])>Services</a>
                <a href="{{ route('contact') }}" @class(['border-b-2 pb-1 font-medium hover:border-white/60 transition-colors', 'border-orange text-orange' => request()->routeIs('contact'), 'border-transparent text-white' => ! request()->routeIs('contact')])>Contact</a>
                <a href="{{ route('contact') }}" class="inline-flex rounded-md border-2 border-teal bg-teal px-5 py-2.5 sm:px-6 sm:py-3 text-xs font-semibold tracking-[0.12em] uppercase text-white hover:border-teal-dark hover:bg-teal-dark transition-colors mt-2 lg:mt-0">{{ setting('cta_label') ?? 'Get Quote' }}</a>
            </nav>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-forest pt-12 sm:pt-16 text-[#d3e6dd]">
        <div class="wrap">
            <div class="grid gap-8 sm:gap-10 md:grid-cols-[1.3fr_.7fr_1.2fr] md:gap-14">
                <div>
                    <a href="{{ route('home') }}" class="mb-4 flex items-center gap-3 text-white no-underline">
                        <img src="{{ asset($logoPath) }}" alt="{{ $siteName }} logo" width="64" height="64" class="size-14 sm:size-16 md:size-20 rounded-full bg-white p-0.5 shrink-0">
                        <span class="flex flex-col leading-tight min-w-0">
                            <strong class="font-serif text-lg sm:text-xl">{{ $siteName }}</strong>
                            <span class="text-[0.70rem] sm:text-[0.72rem] tracking-[0.14em] uppercase opacity-85">{{ $tagline }}</span>
                        </span>
                    </a>
                    <p class="max-w-sm text-sm sm:text-base leading-relaxed">{{ setting('address') ?? '' }}</p>
                </div>
                <div>
                    <h4 class="mb-3 sm:mb-4 font-serif text-lg sm:text-xl text-white">Quick links</h4>
                    <ul class="space-y-1.5 text-sm sm:text-base">
                        <li><a class="text-[#9be0cf] hover:underline" href="{{ route('home') }}">Home</a></li>
                        <li><a class="text-[#9be0cf] hover:underline" href="{{ route('about') }}">About</a></li>
                        <li><a class="text-[#9be0cf] hover:underline" href="{{ route('services') }}">Services</a></li>
                        <li><a class="text-[#9be0cf] hover:underline" href="{{ route('produce') }}">Fruits &amp; Veg</a></li>
                        <li><a class="text-[#9be0cf] hover:underline" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="mb-3 sm:mb-4 font-serif text-lg sm:text-xl text-white">Get in touch</h4>
                    <ul class="space-y-2 text-sm sm:text-base break-words">
                        <li>{{ setting('sales_label') ?? 'Malik Zafar Mureed' }}: <a class="text-[#9be0cf] hover:underline inline-block" href="tel:{{ $salesTel }}">{{ setting('sales_phone') ?? '' }}</a></li>
                        <li>{{ setting('telephone_label') ?? 'Telephone' }}: <a class="text-[#9be0cf] hover:underline inline-block" href="tel:{{ $officeTel }}">{{ setting('telephone') ?? '' }}</a></li>
                        <li><a class="text-[#9be0cf] hover:underline break-all" href="mailto:{{ setting('email_info') ?? '' }}">{{ setting('email_info') ?? '' }}</a></li>
                        <li><a class="text-[#9be0cf] hover:underline break-all" href="mailto:{{ setting('email_hr') ?? '' }}">{{ setting('email_hr') ?? '' }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-10 sm:mt-14 border-t border-white/12 py-5 text-center text-xs sm:text-sm text-[#9bb8ac]">
                {{ setting('copyright') ?? '' }}
            </div>
        </div>
    </footer>
</body>
</html>
