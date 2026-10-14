<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page->title ?? $siteName }}</title>
    <meta name="description" content="{{ $page->meta_description ?? '' }}">
    <link rel="icon" href="{{ asset($logoPath) }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-ink">
    <header class="absolute inset-x-0 top-0 z-20 py-4 bg-white shadow-sm border-b border-line">
        <div class="wrap flex items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="flex items-center gap-3 text-ink no-underline hover:opacity-90 transition-opacity">
                <img src="{{ asset($logoPath) }}" alt="{{ $siteName }} logo" width="56" height="56" class="size-14 rounded-full bg-mist p-1 shadow-sm">
                <span class="flex flex-col leading-tight">
                    <strong class="font-sans font-bold text-xl tracking-wide text-forest-deep">{{ $siteName }}</strong>
                    <span class="hidden text-[0.70rem] tracking-[0.16em] uppercase text-teal sm:block font-semibold">{{ $tagline }}</span>
                </span>
            </a>

            <input type="checkbox" id="nav-toggle" class="peer sr-only">
            <label for="nav-toggle" class="z-30 grid cursor-pointer gap-1.5 p-2 lg:hidden" aria-label="Open menu">
                <span class="block h-0.5 w-6 bg-ink transition-transform peer-checked:rotate-45 peer-checked:translate-y-2"></span>
                <span class="block h-0.5 w-6 bg-ink transition-opacity peer-checked:opacity-0"></span>
                <span class="block h-0.5 w-6 bg-ink transition-transform peer-checked:-rotate-45 peer-checked:-translate-y-2"></span>
            </label>

            <nav class="fixed inset-y-0 right-0 z-25 flex w-[min(320px,82vw)] translate-x-full flex-col items-start justify-center gap-6 bg-white p-10 text-ink shadow-2xl transition-transform duration-300 ease-out peer-checked:translate-x-0 lg:static lg:flex lg:w-auto lg:translate-x-0 lg:flex-row lg:items-center lg:gap-8 lg:bg-transparent lg:p-0 lg:shadow-none">
                <a href="{{ route('home') }}" @class(['pb-1 font-semibold text-sm hover:text-teal transition-colors border-b-2', 'border-teal text-teal' => request()->routeIs('home'), 'border-transparent text-forest-deep' => ! request()->routeIs('home')])>Home</a>
                <a href="{{ route('about') }}" @class(['pb-1 font-semibold text-sm hover:text-teal transition-colors border-b-2', 'border-teal text-teal' => request()->routeIs('about'), 'border-transparent text-forest-deep' => ! request()->routeIs('about')])>About Us</a>
                <a href="{{ route('services') }}" @class(['pb-1 font-semibold text-sm hover:text-teal transition-colors border-b-2', 'border-teal text-teal' => request()->routeIs('services'), 'border-transparent text-forest-deep' => ! request()->routeIs('services')])>Services</a>
                <a href="{{ route('contact') }}" @class(['pb-1 font-semibold text-sm hover:text-teal transition-colors border-b-2', 'border-teal text-teal' => request()->routeIs('contact'), 'border-transparent text-forest-deep' => ! request()->routeIs('contact')])>Contact</a>
            </nav>

            <div class="hidden lg:block z-25">
                <a href="{{ route('contact') }}" class="inline-flex rounded-sm bg-forest-deep px-6 py-3 text-xs font-bold uppercase text-white hover:bg-teal hover:shadow-lg transition-all duration-300">{{ setting('cta_label') ?? 'Get Free Quote' }}</a>
            </div>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-forest pt-20 pb-8 text-[#d3e6dd] border-t-8 border-forest-deep relative overflow-hidden">
        <div class="absolute inset-0 opacity-5 pointer-events-none page-hero-glow"></div>
        <div class="wrap relative z-10">
            <div class="grid gap-10 md:grid-cols-[1.5fr_.7fr_1.2fr] md:gap-14">
                <div>
                    <a href="{{ route('home') }}" class="mb-6 flex items-center gap-3 text-white no-underline hover:opacity-90 transition-opacity">
                        <img src="{{ asset($logoPath) }}" alt="{{ $siteName }} logo" width="72" height="72" class="size-[72px] rounded-full bg-white p-1 shadow-lg">
                        <span class="flex flex-col leading-tight">
                            <strong class="font-serif text-2xl">{{ $siteName }}</strong>
                            <span class="text-[0.75rem] font-bold tracking-[0.15em] text-teal uppercase mt-0.5">{{ $tagline }}</span>
                        </span>
                    </a>
                    <p class="max-w-sm leading-relaxed mb-6"><i class="fa-solid fa-location-dot mr-2 text-teal"></i>{{ setting('address') ?? '' }}</p>
                    <div class="flex gap-4">
                        <a href="#" class="size-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-teal hover:text-white transition-colors"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="size-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-teal hover:text-white transition-colors"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="size-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-teal hover:text-white transition-colors"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="mb-6 font-sans font-bold text-xl text-white flex items-center gap-2"><i class="fa-solid fa-link text-leaf text-sm"></i> Quick links</h4>
                    <ul class="space-y-3 font-medium">
                        <li><a class="text-mist hover:text-white hover:pl-2 transition-all flex items-center gap-2" href="{{ route('home') }}"><i class="fa-solid fa-chevron-right text-[10px] text-teal"></i> Home</a></li>
                        <li><a class="text-mist hover:text-white hover:pl-2 transition-all flex items-center gap-2" href="{{ route('about') }}"><i class="fa-solid fa-chevron-right text-[10px] text-teal"></i> About Us</a></li>
                        <li><a class="text-mist hover:text-white hover:pl-2 transition-all flex items-center gap-2" href="{{ route('services') }}"><i class="fa-solid fa-chevron-right text-[10px] text-teal"></i> Services</a></li>
                        <li><a class="text-mist hover:text-white hover:pl-2 transition-all flex items-center gap-2" href="{{ route('contact') }}"><i class="fa-solid fa-chevron-right text-[10px] text-teal"></i> Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="mb-6 font-sans font-bold text-xl text-white flex items-center gap-2"><i class="fa-regular fa-comments text-leaf text-sm"></i> Get in touch</h4>
                    <ul class="space-y-4 font-medium">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-headset mt-1 text-teal"></i>
                            <div>
                                <span class="block text-xs uppercase tracking-wider text-white/50 mb-0.5">{{ setting('sales_label') ?? 'Sales Manager' }}</span>
                                <a class="text-[#9be0cf] hover:text-white transition-colors text-lg" href="tel:{{ $salesTel }}">{{ setting('sales_phone') ?? '' }}</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-phone mt-1 text-teal"></i>
                            <div>
                                <span class="block text-xs uppercase tracking-wider text-white/50 mb-0.5">{{ setting('telephone_label') ?? 'Telephone' }}</span>
                                <a class="text-[#9be0cf] hover:text-white transition-colors text-lg" href="tel:{{ $officeTel }}">{{ setting('telephone') ?? '' }}</a>
                            </div>
                        </li>
                        <li class="flex items-center gap-3 mt-4 pt-4 border-t border-white/10">
                            <i class="fa-solid fa-envelope text-teal"></i>
                            <div class="flex flex-col gap-1">
                                <a class="text-[#9be0cf] hover:text-white transition-colors" href="mailto:{{ setting('email_info') ?? '' }}">{{ setting('email_info') ?? '' }}</a>
                                <a class="text-[#9be0cf] hover:text-white transition-colors" href="mailto:{{ setting('email_hr') ?? '' }}">{{ setting('email_hr') ?? '' }}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-16 border-t border-white/10 pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-[#9bb8ac]">
                <p>&copy; {{ date('Y') }} {{ $siteName }}. All rights reserved.</p>
                <p>{{ setting('copyright') ?? '' }}</p>
            </div>
        </div>
    </footer>
</body>
</html>
