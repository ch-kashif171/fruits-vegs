@props([
    'title',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | Admin</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('admin/css/admin.css')}}">
</head>
<body class="min-h-screen bg-mist font-sans text-ink antialiased">
    <div class="min-h-screen lg:grid lg:grid-cols-[240px_1fr]">
        <aside class="bg-forest text-white">
            <div class="flex items-center gap-3 px-5 py-6">
                <img src="{{ asset('images/logo.png') }}" alt="" width="40" height="40" class="size-10 rounded-full bg-white p-0.5">
                <div>
                    <p class="font-serif text-lg leading-tight">Zahrat Al Madina</p>
                    <p class="text-xs tracking-wide text-white/70 uppercase">Admin</p>
                </div>
            </div>
            <nav class="flex flex-col gap-1 px-3 pb-6 text-sm">
                <a href="{{ route('admin.dashboard') }}" @class(['flex items-center gap-2 rounded-md px-3 py-2 transition-colors', 'bg-white/15 text-white font-medium' => request()->routeIs('admin.dashboard'), 'text-white/80 hover:bg-white/10 hover:text-white' => ! request()->routeIs('admin.dashboard')])>
                    <i class="fa-solid fa-gauge-high w-5 text-center"></i> Dashboard
                </a>
                <a href="{{ route('admin.pages.index') }}" @class(['flex items-center gap-2 rounded-md px-3 py-2 transition-colors', 'bg-white/15 text-white font-medium' => request()->routeIs('admin.pages.*'), 'text-white/80 hover:bg-white/10 hover:text-white' => ! request()->routeIs('admin.pages.*')])>
                    <i class="fa-solid fa-file-lines w-5 text-center"></i> Pages
                </a>
                <a href="{{ route('admin.services.index') }}" @class(['flex items-center gap-2 rounded-md px-3 py-2 transition-colors', 'bg-white/15 text-white font-medium' => request()->routeIs('admin.services.*'), 'text-white/80 hover:bg-white/10 hover:text-white' => ! request()->routeIs('admin.services.*')])>
                    <i class="fa-solid fa-briefcase w-5 text-center"></i> Services
                </a>
                <a href="{{ route('admin.sliders.index') }}" @class(['flex items-center gap-2 rounded-md px-3 py-2 transition-colors', 'bg-white/15 text-white font-medium' => request()->routeIs('admin.sliders.*'), 'text-white/80 hover:bg-white/10 hover:text-white' => ! request()->routeIs('admin.sliders.*')])>
                    <i class="fa-solid fa-images w-5 text-center"></i> Sliders
                </a>
                {{--<a href="{{ route('admin.features.index') }}" @class(['flex items-center gap-2 rounded-md px-3 py-2 transition-colors', 'bg-white/15 text-white font-medium' => request()->routeIs('admin.features.*'), 'text-white/80 hover:bg-white/10 hover:text-white' => ! request()->routeIs('admin.features.*')])>
                    <i class="fa-solid fa-list w-5 text-center"></i> Features
                </a>--}}
                <a href="{{ route('admin.produce-items.index') }}" @class(['flex items-center gap-2 rounded-md px-3 py-2 transition-colors', 'bg-white/15 text-white font-medium' => request()->routeIs('admin.produce-items.*'), 'text-white/80 hover:bg-white/10 hover:text-white' => ! request()->routeIs('admin.produce-items.*')])>
                    <i class="fa-solid fa-leaf w-5 text-center"></i> Produce
                </a>
                <a href="{{ route('admin.faqs.index') }}" @class(['flex items-center gap-2 rounded-md px-3 py-2 transition-colors', 'bg-white/15 text-white font-medium' => request()->routeIs('admin.faqs.*'), 'text-white/80 hover:bg-white/10 hover:text-white' => ! request()->routeIs('admin.faqs.*')])>
                    <i class="fa-solid fa-circle-question w-5 text-center"></i> FAQs
                </a>
                <a href="{{ route('admin.enquiries.index') }}" @class(['flex items-center justify-between rounded-md px-3 py-2 transition-colors', 'bg-white/15 text-white font-medium' => request()->routeIs('admin.enquiries.*'), 'text-white/80 hover:bg-white/10 hover:text-white' => ! request()->routeIs('admin.enquiries.*')])>
                    <span class="flex items-center gap-2"><i class="fa-solid fa-envelope w-5 text-center"></i> Enquiries</span>
                    @if ($unreadEnquiriesCount > 0)
                        <span class="rounded-full bg-orange px-2 py-0.5 text-xs font-bold text-white shadow-sm">{{ $unreadEnquiriesCount }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.settings.edit') }}" @class(['flex items-center gap-2 rounded-md px-3 py-2 transition-colors', 'bg-white/15 text-white font-medium' => request()->routeIs('admin.settings.*'), 'text-white/80 hover:bg-white/10 hover:text-white' => ! request()->routeIs('admin.settings.*')])>
                    <i class="fa-solid fa-gear w-5 text-center"></i> Site settings
                </a>
            </nav>
        </aside>

        <div class="flex min-w-0 flex-col">
            <header class="flex items-center justify-between gap-4 border-b border-forest-light bg-forest px-4 py-4 sticky top-0 z-10 sm:px-8 text-white shadow-md">
                <h1 class="font-serif text-2xl text-white">{{ $title }}</h1>
                <div class="flex items-center gap-5 text-sm">
                    <a href="{{ route('home') }}" class="flex items-center gap-1 text-teal-light hover:text-white transition-colors" target="_blank" rel="noopener">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> View site
                    </a>
                    <div class="h-6 w-px bg-white/20"></div>
                    <div class="flex items-center gap-2">
                        <div class="flex size-8 items-center justify-center rounded-full bg-white/20 text-white font-semibold border border-white/30">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <span class="font-medium text-white">{{ auth()->user()->name }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-1 rounded-md text-red-300 hover:text-white hover:bg-red-500/30 px-2 py-1 transition-colors">
                            <i class="fa-solid fa-right-from-bracket"></i> Log out
                        </button>
                    </form>
                </div>
            </header>

            <main class="p-4 sm:p-8">
                @if (session('status'))
                    <p class="mb-6 rounded-md bg-mint px-4 py-3 text-forest">{{ session('status') }}</p>
                @endif
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
