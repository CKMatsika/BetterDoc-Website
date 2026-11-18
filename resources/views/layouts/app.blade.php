<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('site.name'))</title>
    <meta name="description" content="@yield('description', config('site.description'))">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', trim($__env->yieldContent('title')) ?: config('site.name'))">
    <meta property="og:description" content="@yield('og_description', trim($__env->yieldContent('description')) ?: config('site.description'))">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:image" content="@yield('og_image', asset('og-image.png'))">
    <meta property="og:site_name" content="{{ config('site.name') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', trim($__env->yieldContent('title')) ?: config('site.name'))">
    <meta name="twitter:description" content="@yield('og_description', trim($__env->yieldContent('description')) ?: config('site.description'))">
    <meta name="twitter:image" content="@yield('og_image', asset('og-image.png'))">
    @yield('structured_data')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
</head>
<body class="bg-[#F7F8FA] text-[#0F172A] antialiased">
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 bg-white px-4 py-2 rounded shadow z-50">Skip to content</a>
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur border-b border-[#E2E8F0]">
        <div class="max-w-[1180px] mx-auto px-4 sm:px-6 flex items-center justify-between h-16">
            <a href="{{ route('home') }}" class="font-semibold text-lg text-[#0F172A]">{{ config('site.name') }}</a>
            <nav class="hidden md:flex items-center gap-6 text-sm">
                <a href="{{ route('features') }}" class="hover:text-[#0E7C66]">Features</a>
                <a href="{{ route('solutions.defence') }}" class="hover:text-[#0E7C66]">Solutions</a>
                <a href="{{ route('security') }}" class="hover:text-[#0E7C66]">Security</a>
                <a href="{{ route('deployment') }}" class="hover:text-[#0E7C66]">Deployment</a>
                <a href="{{ route('how-we-work') }}" class="hover:text-[#0E7C66]">How we work</a>
                <a href="{{ route('faq') }}" class="hover:text-[#0E7C66]">FAQ</a>
                <a href="{{ route('about') }}" class="hover:text-[#0E7C66]">About</a>
                <a href="{{ route('contact') }}" class="hover:text-[#0E7C66]">Contact</a>
            </nav>
            <div class="flex items-center gap-2.5">
                @if(filled(config('site.portal_url')))
                    <a href="{{ config('site.portal_url') }}" class="hidden sm:inline-block rounded-[14px] border border-[#E2E8F0] px-3.5 py-2 text-sm font-medium text-[#0F172A] hover:bg-slate-50">Sign in</a>
                @endif
                @if(filled(config('site.signup_url')))
                    <a href="{{ config('site.signup_url') }}" class="hidden sm:inline-block rounded-[14px] bg-[#DDF3EC] px-3.5 py-2 text-sm font-medium text-[#0E7C66] hover:bg-[#cdece2]">Create Organisation</a>
                @endif
                <a href="{{ route('contact') }}" class="bg-[#0E7C66] hover:bg-[#0A6552] text-white px-4 py-2 rounded-[14px] text-sm font-medium">Book a demo</a>
                <details class="relative md:hidden">
                    <summary class="list-none cursor-pointer rounded-[10px] border border-[#E2E8F0] px-3 py-2 text-xs font-semibold text-[#0F172A]">Menu</summary>
                    <nav class="absolute right-0 mt-2 w-56 rounded-[14px] border border-[#E2E8F0] bg-white p-3 shadow-lg space-y-1 text-sm">
                        <a href="{{ route('features') }}" class="block rounded-lg px-3 py-1.5 hover:bg-slate-50">Features</a>
                        <a href="{{ route('solutions.defence') }}" class="block rounded-lg px-3 py-1.5 hover:bg-slate-50">Solutions</a>
                        <a href="{{ route('security') }}" class="block rounded-lg px-3 py-1.5 hover:bg-slate-50">Security</a>
                        <a href="{{ route('deployment') }}" class="block rounded-lg px-3 py-1.5 hover:bg-slate-50">Deployment</a>
                        <a href="{{ route('how-we-work') }}" class="block rounded-lg px-3 py-1.5 hover:bg-slate-50">How we work</a>
                        <a href="{{ route('faq') }}" class="block rounded-lg px-3 py-1.5 hover:bg-slate-50">FAQ</a>
                        <a href="{{ route('about') }}" class="block rounded-lg px-3 py-1.5 hover:bg-slate-50">About</a>
                        <a href="{{ route('contact') }}" class="block rounded-lg px-3 py-1.5 hover:bg-slate-50">Contact</a>
                        @if(filled(config('site.portal_url')))
                            <a href="{{ config('site.portal_url') }}" class="block rounded-lg px-3 py-1.5 font-medium text-[#0E7C66] hover:bg-slate-50">Sign in</a>
                        @endif
                        @if(filled(config('site.signup_url')))
                            <a href="{{ config('site.signup_url') }}" class="block rounded-lg px-3 py-1.5 font-medium text-[#0E7C66] hover:bg-slate-50">Create Organisation</a>
                        @endif
                    </nav>
                </details>
            </div>
        </div>
    </header>
    <main id="main">
        @yield('content')
    </main>
    <footer class="border-t border-[#E2E8F0] mt-20 bg-white">
        <div class="max-w-[1180px] mx-auto px-4 sm:px-6 py-10 grid md:grid-cols-3 gap-6 text-sm">
            <div>
                <div class="font-semibold">{{ config('site.name') }}</div>
                <p class="mt-2 text-slate-600">{{ config('site.tagline') }}</p>
                <p class="mt-3 text-xs text-slate-500">A product of {{ config('site.company') }}</p>
                @if(filled(config('site.logo')))
                    <img src="{{ asset(config('site.logo')) }}" alt="{{ config('site.company') }}" class="mt-2 h-8" loading="lazy">
                @endif
            </div>
            <div>
                <div class="font-semibold mb-2">Company</div>
                <ul class="space-y-1 text-slate-600">
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('security') }}">Security</a></li>
                    <li><a href="{{ route('privacy') }}">Privacy notice</a></li>
                    <li><a href="{{ route('terms') }}">Terms</a></li>
                </ul>
            </div>
            <div>
                <div class="font-semibold mb-2">Contact</div>
                <p class="text-slate-600">{{ config('site.email') }}</p>
                <p class="text-slate-600">{{ config('site.phone') }}</p>
                <p class="text-slate-600">{{ config('site.address') }}</p>
            </div>
        </div>
        <div class="max-w-[1180px] mx-auto px-4 sm:px-6 py-4 text-xs text-slate-500 border-t border-[#E2E8F0]">
            &copy; {{ date('Y') }} {{ config('site.name') }}. All rights reserved.
        </div>
    </footer>
</body>
</html>
