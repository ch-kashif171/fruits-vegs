@props([
    'title',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | Zahrat Al Madina</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('admin/css/admin.css')}}">
</head>
<body class="min-h-screen bg-mist font-sans text-ink antialiased">
    <div class="grid min-h-screen lg:grid-cols-2">
        <aside class="admin-cover relative hidden overflow-hidden bg-forest p-12 text-white lg:flex lg:flex-col lg:justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 text-white no-underline">
                <img src="{{ asset('images/logo.png') }}" alt="" width="56" height="56" class="size-14 rounded-full bg-white p-0.5">
                <span class="font-serif text-2xl">Zahrat Al Madina</span>
            </a>
            <div>
                <p class="font-serif text-4xl text-balance">Fresh produce, managed with care.</p>
                <p class="mt-4 max-w-sm text-white/80">Sign in to update pages, services, produce, FAQs and enquiries.</p>
            </div>
            <p class="text-sm text-white/60">Admin workspace</p>
        </aside>
        <main class="flex items-center justify-center p-6 sm:p-12">
            <div class="w-full max-w-md">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
