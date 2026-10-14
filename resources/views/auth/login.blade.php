<x-layouts.auth title="Log in">
    <h1 class="font-serif text-3xl">Welcome back</h1>
    <p class="mt-2 text-muted">Log in to the admin panel.</p>

    <form method="POST" action="{{ route('login.store') }}" class="mt-8 grid gap-4">
        @csrf
        <div>
            <label for="email" class="mb-1 block text-sm font-semibold">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full rounded-md border border-line bg-white px-4 py-3 focus:border-teal focus:ring-3 focus:ring-teal/20 focus:outline-none">
            @error('email')
                <p class="mt-1 text-sm text-tomato">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password" class="mb-1 block text-sm font-semibold">Password</label>
            <input id="password" name="password" type="password" required autocomplete="current-password" class="w-full rounded-md border border-line bg-white px-4 py-3 focus:border-teal focus:ring-3 focus:ring-teal/20 focus:outline-none">
        </div>
        <label class="flex items-center gap-2 text-sm">
            <input type="checkbox" name="remember" class="rounded border-line text-teal">
            Remember me
        </label>
        <button type="submit" class="rounded-md bg-teal px-5 py-3 font-semibold text-white hover:bg-teal-dark">Log in</button>
    </form>

    <p class="mt-6 text-sm text-muted">Need an account? <a href="{{ route('register') }}" class="font-semibold text-teal-dark hover:underline">Sign up</a></p>
</x-layouts.auth>
