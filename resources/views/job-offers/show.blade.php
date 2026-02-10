<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-orange-500 leading-tight">
            {{ __('Job Details') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-zinc-900 border border-zinc-800 rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col md:flex-row relative">
                <div
                    class="absolute -left-20 -top-20 w-64 h-64 bg-orange-500/5 rounded-full blur-3xl p-1 pointer-events-none">
                </div>

                <!-- Left: Content -->
                <div class="flex-1 p-8 md:p-16 border-b md:border-b-0 md:border-r border-zinc-800 relative z-10">
                    <div class="mb-14">
                        <div class="flex items-center space-x-4 mb-8">
                            <span
                                class="px-4 py-1.5 bg-zinc-800 border border-zinc-700 text-orange-500 rounded-full text-[10px] font-black uppercase tracking-[0.2em] shadow-sm">
                                {{ $offer->type_contrat }}
                            </span>
                        </div>

                        <h1 class="text-4xl md:text-6xl font-black text-white leading-[1.1] mb-8 tracking-tighter">
                            {{ $offer->title }}</h1>

                        <div
                            class="flex items-center text-zinc-400 font-bold bg-zinc-800/50 inline-flex px-6 py-3 rounded-2xl border border-zinc-800">
                            <svg class="w-6 h-6 mr-4 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            {{ $offer->entreprise }}
                        </div>
                    </div>

                    <div class="prose prose-invert prose-orange max-w-none">
                        <h2 class="text-xs font-black text-zinc-500 uppercase tracking-[0.3em] mb-8">Role Description
                        </h2>
                        <div class="text-zinc-300 leading-relaxed text-xl whitespace-pre-line font-medium opacity-90">
                            {{ $offer->description }}
                        </div>
                    </div>
                </div>

                <!-- Right: Action Sidebar -->
                <div class="w-full md:w-80 bg-zinc-950/50 p-8 md:p-12 flex flex-col gap-12 relative z-10">
                    @if ($offer->image)
                        <div
                            class="rounded-[2rem] overflow-hidden aspect-square shadow-2xl shadow-orange-500/10 border-4 border-zinc-800">
                            <img src="{{ asset('storage/' . $offer->image) }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div
                            class="rounded-[2rem] aspect-square bg-zinc-900 border-2 border-zinc-800 flex items-center justify-center p-10 group">
                            <svg class="w-20 h-20 text-zinc-800 group-hover:text-orange-500 transition-colors duration-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    @endif

                    <div class="space-y-8">
                        @role('job_seeker')
                        <div class="bg-zinc-900 p-3 rounded-[2rem] shadow-lg border border-zinc-800">
                            <livewire:apply-to-job :jobOfferId="$offer->id" />
                        </div>
                        @endrole

                        @if (auth()->id() === $offer->user_id)
                            <a href="{{ route('recruiter.offers') }}"
                                class="flex items-center justify-center w-full py-5 bg-white border border-transparent rounded-[1.5rem] text-black font-black text-sm hover:bg-orange-500 transition-all shadow-xl active:scale-95 group">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Listing
                            </a>
                        @endif

                        <a href="{{ route('dashboard') }}"
                            class="flex items-center justify-center w-full py-2 text-xs font-black text-zinc-600 hover:text-orange-500 transition-all group tracking-widest uppercase">
                            <svg class="w-5 h-5 mr-3 transform group-hover:-translate-x-2 transition-transform duration-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            Back Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>