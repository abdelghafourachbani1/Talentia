<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Talentia - Connecting Talent with Opportunity</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans bg-white text-gray-900">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Minimal Nav -->
        <nav class="flex items-center justify-between py-8 border-b border-gray-50">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-tight">Talentia.</span>
            </div>

            @if (Route::has('login'))
                <div class="flex items-center space-x-8">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-sm font-semibold text-gray-600 hover:text-indigo-600 transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-semibold text-gray-600 hover:text-indigo-600 transition-colors">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="bg-gray-900 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-800 transition-all">Sign
                                Up</a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>

        <!-- Hero Section -->
        <main class="py-24 lg:py-32">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-5xl lg:text-7xl font-extrabold text-gray-900 tracking-tight leading-[1.1] mb-8">
                    Find your next <span class="text-indigo-600">career</span> move with ease.
                </h1>
                <p class="text-lg text-gray-500 mb-12 leading-relaxed">
                    A simple, beautiful platform designed to connect ambitious talent with the best companies. No
                    clutter, just opportunities.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('register') }}"
                        class="w-full sm:w-auto bg-indigo-600 text-white px-10 py-4 rounded-xl text-lg font-bold hover:bg-indigo-700 transition-all shadow-md">
                        Get Started
                    </a>
                    <a href="#features"
                        class="w-full sm:w-auto px-10 py-4 text-lg font-bold text-gray-600 hover:text-gray-900 transition-colors">
                        Learn More
                    </a>
                </div>

                <div class="mt-20 pt-12 border-t border-gray-50">
                    <p class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-8">Trusted by industry
                        leaders</p>
                    <div class="flex flex-wrap justify-center gap-12 grayscale opacity-40">
                        <!-- Simplified Logo Placeholders -->
                        <span class="text-2xl font-black italic">TECHNO</span>
                        <span class="text-2xl font-black italic">GLOBAL</span>
                        <span class="text-2xl font-black italic">VANTAGE</span>
                        <span class="text-2xl font-black italic">CLOUD</span>
                    </div>
                </div>
            </div>
        </main>

        <!-- Features -->
        <section id="features" class="py-24 grid md:grid-cols-3 gap-12 border-t border-gray-50">
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Clean Profiles</h3>
                <p class="text-gray-500 leading-relaxed text-sm">Create a professional presence without the noise.
                    Focused on your skills and achievements.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Swift Search</h3>
                <p class="text-gray-500 leading-relaxed text-sm">Our streamlined search helps you find the right role in
                    seconds, not hours.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Direct Connections</h3>
                <p class="text-gray-500 leading-relaxed text-sm">Apply directly and communicate with recruiters through
                    a simplified interface.</p>
            </div>
        </section>

        <footer class="py-12 border-t border-gray-50 text-center">
            <p class="text-gray-400 text-sm font-medium">© {{ date('Y') }} Talentia Platform. Simplified for success.
            </p>
        </footer>
    </div>
</body>

</html>