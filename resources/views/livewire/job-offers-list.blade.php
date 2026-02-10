<div class="space-y-8">
    <!-- Job Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($offers as $offer)
            <a href="{{ route('job.offers.show', $offer->id) }}"
                class="bg-zinc-900 border border-zinc-800 rounded-[2rem] p-8 shadow-sm hover:shadow-2xl hover:shadow-orange-500/10 hover:-translate-y-2 hover:border-orange-500/30 transition-all duration-500 flex flex-col group relative overflow-hidden">
                <!-- Hover Glow Effect -->
                <div
                    class="absolute -right-10 -top-10 w-32 h-32 bg-orange-500/10 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>

                <div class="flex items-start justify-between mb-8 relative">
                    <div
                        class="w-16 h-16 bg-zinc-800 rounded-2xl flex items-center justify-center border border-zinc-700 group-hover:bg-orange-500 group-hover:border-orange-400 transition-all duration-500 shadow-inner overflow-hidden">
                        @if($offer->image)
                            <img src="{{ asset('storage/' . $offer->image) }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-zinc-900">
                                <svg class="w-8 h-8 text-orange-500 group-hover:text-black transition-colors duration-500"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <span
                        class="px-4 py-1.5 bg-zinc-800 border border-zinc-700 text-zinc-400 group-hover:text-orange-500 group-hover:border-orange-500/50 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm transition-all duration-500">
                        {{ $offer->type_contrat }}
                    </span>
                </div>

                <div class="flex-1 relative">
                    <h3
                        class="text-xl font-black text-white mb-2 group-hover:text-orange-500 transition-colors duration-500 truncate leading-tight">
                        {{ $offer->title }}
                    </h3>
                    <p
                        class="text-sm font-bold text-zinc-500 mb-8 flex items-center group-hover:text-zinc-400 transition-colors duration-500">
                        <svg class="w-4 h-4 mr-2 text-orange-500/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        {{ $offer->entreprise }}
                    </p>
                </div>

                <div
                    class="mt-auto pt-6 border-t border-zinc-800 flex items-center justify-between relative group-hover:border-orange-500/20 transition-colors duration-500">
                    <span
                        class="text-[10px] font-black text-zinc-600 uppercase tracking-[0.2em] group-hover:text-orange-500/50 transition-colors duration-500">View
                        Details</span>
                    <div
                        class="w-10 h-10 rounded-xl bg-zinc-800 flex items-center justify-center text-orange-500 group-hover:bg-orange-500 group-hover:text-black transition-all duration-500 transform group-hover:rotate-12">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </div>
                </div>
            </a>
        @empty
            <div
                class="col-span-full py-24 text-center bg-zinc-900 border border-dashed border-zinc-800 rounded-[2rem] shadow-sm">
                <div class="w-20 h-20 bg-zinc-800 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-orange-500/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-white">No opportunities found</h3>
                <p class="text-zinc-500 mt-2 font-medium">Be the first to post a new listing in this category.</p>
            </div>
        @endforelse
    </div>

    @if($offers->hasMorePages())
        <div class="mt-16 text-center pb-12">
            <button wire:click="loadMore"
                class="inline-flex items-center px-10 py-4 bg-zinc-900 border border-zinc-800 rounded-2xl text-sm font-black text-zinc-400 hover:bg-orange-500 hover:text-black hover:border-orange-400 hover:shadow-2xl hover:shadow-orange-500/20 transition-all duration-500 active:scale-95 group">
                Fetch More Listings
                <svg class="w-5 h-5 ml-3 transform group-hover:translate-y-1 transition-transform duration-500" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>
    @endif
</div>