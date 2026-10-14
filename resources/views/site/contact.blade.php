<x-layouts.site :page="$page">

    <!-- Page Hero -->
    <section class="pt-32 pb-16 lg:pt-40 lg:pb-24 bg-forest-deep text-white relative overflow-hidden banner-ht">
        <div class="absolute inset-0 opacity-10 pointer-events-none page-hero-glow"></div>
        <div class="wrap relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-sans font-bold mb-4">{{ $page->title ?? 'Contact Us' }}</h1>
            <p class="text-mist max-w-2xl mx-auto">{{ $page->excerpt ?? 'Contact Zahrat Al Madina at Al Aweer Central Market, Dubai. Phone, email, business hours and enquiry form.' }}</p>
        </div>
        <div class="pv-hero-wave">
            <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-24 bg-white relative">
        <div class="wrap grid lg:grid-cols-5 gap-12 lg:gap-24 items-start">

            <!-- Contact Info -->
            <div class="grid gap-10 lg:col-span-2">
                <div>
                    <h2 class="text-3xl font-sans font-bold text-forest-deep mb-6">Get in touch</h2>
                    <p class="text-muted mb-8">We'd love to hear from you. Whether you're looking for a fresh produce supply or want to partner with us, reach out today.</p>
                </div>

                <div class="grid gap-6">
                    <div class="flex gap-4 p-6 bg-mist rounded-lg border border-line shadow-sm">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-teal shadow-sm shrink-0">
                            <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-teal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-bold text-forest-deep mb-2">Numbers</h3>
                            <ul class="text-sm text-muted space-y-1">
                                <li><b class="text-ink">Malik Zafar Mureed:</b> <br><a href="tel:{{ setting('sales_phone') ?? '+971502528036' }}" class="hover:text-teal transition-colors">{{ str_replace(setting('sales_phone') ?? '+971 50 252 8036', '', '') }}{{ setting('sales_phone') ?? '+971 50 252 8036' }}</a></li>
                                <li><b class="text-ink mt-2 inline-block">Telephone:</b> <br><a href="tel:{{ setting('telephone') ?? '+971505386979' }}" class="hover:text-teal transition-colors">{{ setting('telephone') ?? '+971 50 538 6979' }}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="flex gap-4 p-6 bg-mist rounded-lg border border-line shadow-sm">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-teal shadow-sm shrink-0">
                            <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-teal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-bold text-forest-deep mb-2">Email</h3>
                            <ul class="text-sm text-muted space-y-1">
                                <li><a href="mailto:{{ setting('email_info') ?? 'alzahravegfruits786@email.com' }}" class="hover:text-teal transition-colors break-all">{{ setting('email_info') ?? 'alzahravegfruits786@email.com' }}</a></li>
                                <li><a href="mailto:{{ setting('email_hr') ?? 'hr@zahratalmadinafruitsandveg.com' }}" class="hover:text-teal transition-colors break-all">{{ setting('email_hr') ?? 'hr@zahratalmadinafruitsandveg.com' }}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="flex gap-4 p-6 bg-mist rounded-lg border border-line shadow-sm">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-teal shadow-sm shrink-0">
                            <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-teal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-bold text-forest-deep mb-2">Business hours</h3>
                            <ul class="text-sm text-muted space-y-1">
                                <li>Monday – Friday: 8am – 10pm</li>
                                <li>Saturday: 10am – 3pm</li>
                                <li>Sunday: Closed</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white p-8 lg:p-10 rounded-2xl shadow-2xl border border-line sticky top-32 lg:col-span-3">
                <h3 class="font-sans font-bold text-2xl text-forest-deep mb-6">Send us a message</h3>

                @if(session('success'))
                    <div class="mb-6 rounded-md bg-leaf/20 p-4 border border-leaf">
                        <div class="flex">
                            <div class="flex-shrink-0"><i class="fa-solid fa-circle-check text-leaf"></i></div>
                            <div class="ml-3"><p class="text-sm font-medium text-forest-deep">{{ session('success') }}</p></div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="grid gap-5">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-bold text-forest-deep mb-1">Name</label>
                        <input id="name" name="name" type="text" placeholder="Your Name" required class="w-full rounded-md border border-line bg-mist px-4 py-3 text-sm focus:border-teal focus:bg-white focus:ring-1 focus:ring-teal outline-none transition-all">
                        @error('name')<span class="text-xs text-tomato mt-1 block">{{ $message }}</span>@enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="phone" class="block text-sm font-bold text-forest-deep mb-1">Phone Number</label>
                            <input id="phone" name="phone" type="tel" placeholder="+971..." required class="w-full rounded-md border border-line bg-mist px-4 py-3 text-sm focus:border-teal focus:bg-white focus:ring-1 focus:ring-teal outline-none transition-all">
                            @error('phone')<span class="text-xs text-tomato mt-1 block">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-bold text-forest-deep mb-1">Email</label>
                            <input id="email" name="email" type="email" placeholder="email@example.com" required class="w-full rounded-md border border-line bg-mist px-4 py-3 text-sm focus:border-teal focus:bg-white focus:ring-1 focus:ring-teal outline-none transition-all">
                            @error('email')<span class="text-xs text-tomato mt-1 block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-bold text-forest-deep mb-1">Message</label>
                        <textarea id="message" name="message" placeholder="How can we help you?" required class="h-32 w-full resize-none rounded-md border border-line bg-mist px-4 py-3 text-sm focus:border-teal focus:bg-white focus:ring-1 focus:ring-teal outline-none transition-all"></textarea>
                        @error('message')<span class="text-xs text-tomato mt-1 block">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="w-full rounded-md bg-teal px-6 py-4 text-sm font-bold uppercase text-white hover:bg-forest-deep transition-colors mt-2 shadow-lg hover:shadow-xl hover:-translate-y-0.5">Send message</button>
                </form>
            </div>

        </div>
    </section>

    <!-- Map Section -->
    <section class="h-96 w-full relative">
        <iframe src="https://www.google.com/maps?q=Central+Fruit+and+Vegetable+Market+Al+Aweer+Dubai&output=embed" class="absolute inset-0 w-full h-full border-0" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Map"></iframe>
    </section>

</x-layouts.site>
