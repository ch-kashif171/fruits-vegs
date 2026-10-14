<x-layouts.auth title="Sign up">
    <h1 class="font-serif text-3xl">Create an account</h1>
    <p class="mt-2 text-muted">Sign up for admin access.</p>

    <form method="POST" action="{{ route('register.store') }}" class="mt-8 grid gap-4">
        @csrf
        <div>
            <label for="name" class="mb-1 block text-sm font-semibold">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name" class="w-full rounded-md border border-line bg-white px-4 py-3 focus:border-teal focus:ring-3 focus:ring-teal/20 focus:outline-none">
            @error('name')
                <p class="mt-1 text-sm text-tomato">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email" class="mb-1 block text-sm font-semibold">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username" class="w-full rounded-md border border-line bg-white px-4 py-3 focus:border-teal focus:ring-3 focus:ring-teal/20 focus:outline-none">
            @error('email')
                <p class="mt-1 text-sm text-tomato">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password" class="mb-1 block text-sm font-semibold">Password</label>
            <input id="password" name="password" type="password" required autocomplete="new-password" class="w-full rounded-md border border-line bg-white px-4 py-3 focus:border-teal focus:ring-3 focus:ring-teal/20 focus:outline-none">
            @error('password')
                <p class="mt-1 text-sm text-tomato">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password_confirmation" class="mb-1 block text-sm font-semibold">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="w-full rounded-md border border-line bg-white px-4 py-3 focus:border-teal focus:ring-3 focus:ring-teal/20 focus:outline-none">
        </div>
        <button type="submit" class="rounded-md bg-teal px-5 py-3 font-semibold text-white hover:bg-teal-dark">Sign up</button>
    </form>

    <p class="mt-6 text-sm text-muted">Already have an account? <a href="{{ route('login') }}" class="font-semibold text-teal-dark hover:underline">Log in</a></p>
</x-layouts.auth>
