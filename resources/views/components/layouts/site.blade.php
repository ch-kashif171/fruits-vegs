@props([
    'page' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page->title ?? $siteName }}</title>
    <meta name="description" content="{{ $page->meta_description ?? '' }}">
    <link rel="icon" href="{{ asset($logoPath) }}" type="image/svg+xml">
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('site/css/custom.css')}}">
</head>
<body class="bg-white text-ink">
    <header class="absolute inset-x-0 top-0 z-20 py-5">
        <div class="wrap flex items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="flex items-center gap-3 text-white no-underline hover:opacity-90">
                <img src="{{ asset($logoPath) }}" alt="{{ $siteName }} logo" width="64" height="64" class="size-16 rounded-full bg-white p-0.5 shadow-[0_0_0_3px_rgba(255,255,255,.25)]">
                <span class="flex flex-col leading-tight">
                    <strong class="font-serif text-xl">{{ $siteName }}</strong>
                    <span class="hidden text-[0.72rem] tracking-[0.14em] uppercase opacity-85 sm:block">{{ $tagline }}</span>
                </span>
            </a>

            <input type="checkbox" id="nav-toggle" class="peer sr-only">
            <label for="nav-toggle" class="z-30 grid cursor-pointer gap-1.5 p-2 lg:hidden" aria-label="Open menu">
                <span class="block h-0.5 w-6 bg-white"></span>
                <span class="block h-0.5 w-6 bg-white"></span>
                <span class="block h-0.5 w-6 bg-white"></span>
            </label>

            <nav class="fixed inset-y-0 right-0 z-[25] flex w-[min(320px,82vw)] translate-x-full flex-col items-start justify-center gap-5 bg-forest p-10 text-white transition-transform peer-checked:translate-x-0 lg:static lg:flex lg:w-auto lg:translate-x-0 lg:flex-row lg:items-center lg:gap-8 lg:bg-transparent lg:p-0">
                <a href="{{ route('home') }}" @class(['border-b-2 pb-1 font-medium hover:border-white/60', 'border-orange' => request()->routeIs('home'), 'border-transparent' => ! request()->routeIs('home')])>Home</a>
                <a href="{{ route('produce') }}" @class(['border-b-2 pb-1 font-medium hover:border-white/60', 'border-orange' => request()->routeIs('produce'), 'border-transparent' => ! request()->routeIs('produce')])>Fruits &amp; Veg</a>
                <a href="{{ route('about') }}" @class(['border-b-2 pb-1 font-medium hover:border-white/60', 'border-orange' => request()->routeIs('about'), 'border-transparent' => ! request()->routeIs('about')])>About</a>
                <a href="{{ route('services') }}" @class(['border-b-2 pb-1 font-medium hover:border-white/60', 'border-orange' => request()->routeIs('services'), 'border-transparent' => ! request()->routeIs('services')])>Services</a>
                <a href="{{ route('contact') }}" @class(['border-b-2 pb-1 font-medium hover:border-white/60', 'border-orange' => request()->routeIs('contact'), 'border-transparent' => ! request()->routeIs('contact')])>Contact</a>
                <a href="{{ route('contact') }}" class="inline-flex rounded-md border-2 border-teal bg-teal px-6 py-3 text-xs font-semibold tracking-[0.12em] uppercase text-white hover:border-teal-dark hover:bg-teal-dark">{{ setting('cta_label') ?? 'Get Quota' }}</a>
            </nav>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-forest pt-16 text-[#d3e6dd]">
        <div class="wrap">
            <div class="grid gap-10 md:grid-cols-[1.3fr_.7fr_1.2fr] md:gap-14">
                <div>
                    <a href="{{ route('home') }}" class="mb-4 flex items-center gap-3 text-white no-underline">
                        <img src="{{ asset($logoPath) }}" alt="{{ $siteName }} logo" width="84" height="84" class="size-[84px] rounded-full bg-white p-0.5">
                        <span class="flex flex-col leading-tight">
                            <strong class="font-serif text-xl">{{ $siteName }}</strong>
                            <span class="text-[0.72rem] tracking-[0.14em] uppercase opacity-85">{{ $tagline }}</span>
                        </span>
                    </a>
                    <p class="max-w-sm">{{ setting('address') ?? '' }}</p>
                </div>
                <div>
                    <h4 class="mb-4 font-serif text-xl text-white">Quick links</h4>
                    <ul class="space-y-1">
                        <li><a class="text-[#9be0cf] hover:underline" href="{{ route('home') }}">Home</a></li>
                        <li><a class="text-[#9be0cf] hover:underline" href="{{ route('about') }}">About</a></li>
                        <li><a class="text-[#9be0cf] hover:underline" href="{{ route('services') }}">Services</a></li>
                        <li><a class="text-[#9be0cf] hover:underline" href="{{ route('produce') }}">Fruits &amp; Veg</a></li>
                        <li><a class="text-[#9be0cf] hover:underline" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="mb-4 font-serif text-xl text-white">Get in touch</h4>
                    <ul class="space-y-1">
                        <li>{{ setting('sales_label') ?? 'Malik Zafar Mureed' }}: <a class="text-[#9be0cf] hover:underline" href="tel:{{ $salesTel }}">{{ setting('sales_phone') ?? '' }}</a></li>
                        <li>{{ setting('telephone_label') ?? 'Telephone' }}: <a class="text-[#9be0cf] hover:underline" href="tel:{{ $officeTel }}">{{ setting('telephone') ?? '' }}</a></li>
                        <li><a class="text-[#9be0cf] hover:underline" href="mailto:{{ setting('email_info') ?? '' }}">{{ setting('email_info') ?? '' }}</a></li>
                        <li><a class="text-[#9be0cf] hover:underline" href="mailto:{{ setting('email_hr') ?? '' }}">{{ setting('email_hr') ?? '' }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-14 border-t border-white/12 py-5 text-center text-sm text-[#9bb8ac]">
                {{ setting('copyright') ?? '' }}
            </div>
        </div>
    </footer>
</body>
</html>
