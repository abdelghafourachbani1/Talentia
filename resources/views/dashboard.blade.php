<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-orange-500 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Header Section -->
            <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-8 shadow-2xl relative overflow-hidden">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl"></div>
                <div class="flex items-center space-x-6 relative z-10">
                    <div
                        class="flex-shrink-0 w-20 h-20 bg-orange-500 rounded-2xl flex items-center justify-center text-black text-3xl font-black shadow-lg shadow-orange-500/20">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div>
                        <h1 class="text-3xl font-black text-white">Welcome back, {{ auth()->user()->name }}</h1>
                        <p class="text-zinc-400 mt-1 font-medium">Here's what's happening in your professional network
                            today.</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Actions -->
                <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-8">
                    @role('job_seeker')
                    <!-- Profile Card -->
                    <div
                        class="bg-zinc-900 border border-zinc-800 rounded-3xl p-6 shadow-sm hover:border-orange-500/50 transition-all group relative overflow-hidden">
                        <div
                            class="absolute -right-4 -top-4 w-24 h-24 bg-orange-500/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="w-12 h-12 bg-zinc-800 rounded-xl flex items-center justify-center mb-4 group-hover:bg-orange-500 transition-colors">
                            <svg class="w-6 h-6 text-orange-500 group-hover:text-black transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">My Profile</h3>
                        <p class="text-zinc-500 mb-6 text-sm font-medium">Review and update your professional CV to
                            attract
                            recruiters.</p>
                        <a href="{{ route('profile.form') }}"
                            class="inline-flex items-center justify-center px-4 py-2.5 border border-orange-500 rounded-xl text-sm font-bold text-orange-500 hover:bg-orange-500 hover:text-black transition-all w-full active:scale-95">
                            Manage Profile
                        </a>
                    </div>

                    <!-- Jobs Card -->
                    <div
                        class="bg-zinc-900 border border-zinc-800 rounded-3xl p-6 shadow-sm hover:border-orange-500/50 transition-all group relative overflow-hidden">
                        <div
                            class="absolute -right-4 -top-4 w-24 h-24 bg-orange-500/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="w-12 h-12 bg-zinc-800 rounded-xl flex items-center justify-center mb-4 group-hover:bg-orange-500 transition-colors">
                            <svg class="w-6 h-6 text-orange-500 group-hover:text-black transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Explore Jobs</h3>
                        <p class="text-zinc-500 mb-6 text-sm font-medium">Browse thousands of opportunities tailored to
                            your
                            expertise.</p>
                        <a href="{{ route('offers.index') }}"
                            class="inline-flex items-center justify-center px-4 py-2.5 bg-orange-500 border border-transparent rounded-xl text-sm font-bold text-black hover:bg-orange-600 transition-all w-full shadow-lg shadow-orange-500/10 active:scale-95">
                            Find Opportunities
                        </a>
                    </div>
                    @endrole

                    @role('recruiter')
                    <!-- Post Jobs Card -->
                    <div
                        class="bg-zinc-900 border border-zinc-800 rounded-3xl p-6 shadow-sm hover:border-orange-500/50 transition-all group md:col-span-2 relative overflow-hidden">
                        <div
                            class="absolute -right-10 -top-10 w-40 h-40 bg-orange-500/5 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div class="flex items-center justify-between mb-4 relative z-10">
                            <div
                                class="w-12 h-12 bg-zinc-800 rounded-xl flex items-center justify-center group-hover:bg-orange-500 transition-colors">
                                <svg class="w-6 h-6 text-orange-500 group-hover:text-black transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <a href="{{ route('recruiter.offers') }}"
                                class="inline-flex items-center justify-center px-6 py-2.5 bg-orange-500 border border-transparent rounded-xl text-sm font-bold text-black hover:bg-orange-600 transition-all shadow-lg shadow-orange-500/10 active:scale-95">
                                Manage Job Offers
                            </a>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2 relative z-10">Recruitment Hub</h3>
                        <p class="text-zinc-500 text-sm font-medium relative z-10">Manage your listings, track
                            applications, and find the talent
                            your company needs.</p>
                    </div>
                    @endrole
                </div>

                <!-- Sidebar / Network -->
                <div class="space-y-8">
                    <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-6 shadow-sm">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-bold text-white">Network</h3>
                            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-zinc-300">
                            <livewire:friend-requests />
                        </div>
                    </div>

                    <!-- Platform Updates -->
                    <div class="bg-orange-500 rounded-3xl p-6 text-black shadow-2xl overflow-hidden relative group">
                        <div class="relative z-10">
                            <h4 class="font-black text-xl mb-2">Black & Orange</h4>
                            <p class="text-black/80 text-sm font-bold">We've upgraded to a premium dark aesthetic to
                                match your professional ambitions.</p>
                        </div>
                        <svg class="absolute -bottom-4 -right-4 w-32 h-32 text-black/10 transform rotate-12 transition-transform group-hover:scale-110"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>