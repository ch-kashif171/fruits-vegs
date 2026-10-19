@props([
    'variant' => 'default',
])

<div class="captcha-wrapper rounded-xl border border-teal/20 bg-emerald-50/50 p-4 sm:p-5 shadow-xs transition-all">
    {{-- Honeypot hidden field for bot trap --}}
    <div style="display: none !important;" aria-hidden="true">
        <label for="contact_company_website">Leave this field blank</label>
        <input type="text" name="contact_company_website" id="contact_company_website" value="" tabindex="-1" autocomplete="off">
    </div>

    <!-- Header: Title + Refresh Button -->
    <div class="flex items-center justify-between gap-2 mb-3">
        <div class="flex items-center gap-2 text-forest-deep">
            <svg class="size-4 text-teal shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/>
            </svg>
            <span class="text-xs font-bold uppercase tracking-wider text-forest-deep">Security Verification</span>
        </div>

        <button 
            type="button" 
            class="captcha-refresh inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-xs font-semibold text-teal-dark bg-white hover:bg-teal hover:text-white border border-teal/20 shadow-xs transition-all cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed"
            title="Get another math challenge"
        >
            <svg class="captcha-refresh-icon size-3.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            <span class="captcha-refresh-text">New Question</span>
        </button>
    </div>

    <!-- Math Challenge and Answer Input -->
    <div class="grid grid-cols-1 sm:grid-cols-[auto_1fr] gap-3 items-center">
        <!-- Prominent Math Challenge Badge -->
        <div class="captcha-badge flex items-center justify-center gap-2 bg-white px-5 py-3 rounded-lg border-2 border-teal/30 shadow-xs transition-opacity">
            <span class="text-xs font-semibold text-muted uppercase tracking-wider">Solve:</span>
            <span class="captcha-question font-mono text-xl sm:text-2xl font-black text-forest-deep tracking-wider select-none">
                {{ \App\Services\CaptchaService::getQuestion() }}
            </span>
        </div>

        <!-- Answer Input Field -->
        <div class="relative">
            <input 
                name="captcha" 
                type="text" 
                inputmode="numeric" 
                pattern="[0-9]*" 
                placeholder="Enter answer here" 
                required 
                class="w-full rounded-lg border border-line bg-white px-4 py-3 text-base sm:text-sm font-semibold text-forest-deep placeholder:font-normal placeholder:text-muted focus:border-teal focus:ring-2 focus:ring-teal/20 outline-none transition-all shadow-xs"
            >
        </div>
    </div>

    @error('captcha')
        <div class="flex items-center gap-1.5 mt-2.5 text-xs font-semibold text-tomato">
            <svg class="size-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            <span>{{ $message }}</span>
        </div>
    @enderror

    @error('contact_company_website')
        <span class="text-xs text-tomato mt-2 block">{{ $message }}</span>
    @enderror
</div>

@once
<style>
    @keyframes captcha-spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .captcha-spinning {
        animation: captcha-spin 0.8s linear infinite !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.captcha-refresh').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                if (btn.disabled) {
                    return;
                }

                var icon = btn.querySelector('.captcha-refresh-icon');
                var text = btn.querySelector('.captcha-refresh-text');
                var wrapper = btn.closest('.captcha-wrapper');
                var questionEl = wrapper ? wrapper.querySelector('.captcha-question') : document.querySelector('.captcha-question');
                var inputEl = wrapper ? wrapper.querySelector('input[name="captcha"]') : document.querySelector('input[name="captcha"]');

                btn.disabled = true;
                if (icon) {
                    icon.classList.add('animate-spin', 'captcha-spinning');
                }
                if (text) {
                    text.textContent = 'Loading...';
                }
                if (questionEl) {
                    questionEl.classList.add('opacity-40');
                }

                fetch("{{ route('captcha.refresh') }}", {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(function (res) {
                    if (!res.ok) {
                        throw new Error('Network error');
                    }
                    return res.json();
                })
                .then(function (data) {
                    if (data && data.question) {
                        document.querySelectorAll('.captcha-question').forEach(function (el) {
                            el.textContent = data.question;
                            el.classList.remove('opacity-40');
                        });
                        document.querySelectorAll('input[name="captcha"]').forEach(function (input) {
                            input.value = '';
                        });
                        if (inputEl) {
                            inputEl.focus();
                        }
                    }
                })
                .catch(function (err) {
                    console.error('Failed to refresh captcha', err);
                    if (questionEl) {
                        questionEl.classList.remove('opacity-40');
                    }
                })
                .finally(function () {
                    btn.disabled = false;
                    if (icon) {
                        icon.classList.remove('animate-spin', 'captcha-spinning');
                    }
                    if (text) {
                        text.textContent = 'New Question';
                    }
                });
            });
        });
    });
</script>
@endonce
