<div class="py-12 bg-black min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
            class="bg-zinc-900 border border-zinc-800 rounded-[2.5rem] shadow-2xl p-8 md:p-12 relative overflow-hidden">
            <div
                class="absolute -left-20 -top-20 w-64 h-64 bg-orange-500/5 rounded-full blur-3xl p-1 pointer-events-none">
            </div>

            <div
                class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6 relative z-10">
                <div>
                    <h2 class="text-3xl font-black text-white mb-2">Applicants for <span
                            class="text-orange-500">{{ $offer->title }}</span></h2>
                    <p class="text-zinc-500 font-medium">{{ $offer->entreprise }} • <span
                            class="text-zinc-300">{{ $applications->count() }} total candidates</span></p>
                </div>
                <a href="{{ route('recruiter.offers') }}"
                    class="inline-flex items-center px-6 py-3 bg-zinc-800 border border-zinc-700 rounded-xl text-xs font-black text-zinc-400 hover:text-orange-500 hover:border-orange-500/50 transition-all duration-300 uppercase tracking-widest group shadow-lg">
                    <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    Back to Listings
                </a>
            </div>

            @if (session()->has('message'))
                <div
                    class="bg-orange-500/10 border border-orange-500/20 text-orange-500 px-6 py-4 rounded-2xl mb-10 flex items-center shadow-sm relative z-10">
                    <svg class="w-6 h-6 mr-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-sm font-black uppercase tracking-widest">{{ session('message') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">
                @forelse ($applications as $application)
                            <div
                                class="bg-zinc-800/20 border border-zinc-800 rounded-[2rem] p-8 hover:border-orange-500/30 transition-all duration-500 flex flex-col group hover:shadow-2xl hover:shadow-orange-500/5">
                                <div class="flex items-center space-x-5 mb-8">
                                    <div
                                        class="flex-shrink-0 w-16 h-16 bg-zinc-800 border-2 border-zinc-700 rounded-2xl flex items-center justify-center text-orange-500 font-black text-2xl overflow-hidden shadow-inner group-hover:border-orange-500/50 transition-colors">
                                        @if($application->user->profile && $application->user->profile->photo)
                                            <img src="{{ asset('storage/' . $application->user->profile->photo) }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                        @else
                                            {{ substr($application->user->name, 0, 1) }}
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <h3
                                            class="text-lg font-black text-white truncate group-hover:text-orange-500 transition-colors">
                                            {{ $application->user->name }}</h3>
                                        <p class="text-[10px] text-zinc-500 font-black uppercase tracking-widest truncate">
                                            {{ $application->user->profile->title ?? 'Candidate' }}</p>
                                    </div>
                                </div>

                                <div class="mb-8">
                                    <h4 class="text-[10px] font-black text-zinc-600 uppercase tracking-[0.2em] mb-3">Status Pipeline
                                    </h4>
                                    <span
                                        class="px-4 py-1.5 text-[10px] font-black rounded-full uppercase tracking-[0.2em] shadow-sm
                                            {{ $application->status === 'accepted' ? 'bg-green-500/10 text-green-500 border border-green-500/20' :
                    ($application->status === 'rejected' ? 'bg-red-500/10 text-red-500 border border-red-500/20' : 'bg-orange-500/10 text-orange-500 border border-orange-500/20') }}">
                                        {{ $application->status ?? 'pending' }}
                                    </span>
                                </div>

                                <div class="mt-auto space-y-4">
                                    <a href="{{ route('users.show', $application->user->id) }}"
                                        class="block w-full py-3 bg-zinc-800 border border-zinc-700 rounded-xl text-zinc-400 font-bold text-xs text-center hover:bg-zinc-700 hover:text-white transition-all duration-300 uppercase tracking-widest shadow-sm">
                                        View Full Dossier
                                    </a>
                                    <div class="grid grid-cols-2 gap-3">
                                        <button wire:click="updateStatus({{ $application->id }}, 'accepted')"
                                            class="py-3 bg-orange-500 hover:bg-orange-600 text-black rounded-xl font-black text-[10px] uppercase tracking-[0.2em] transition-all shadow-lg shadow-orange-500/10 active:scale-95">
                                            Enlist
                                        </button>
                                        <button wire:click="updateStatus({{ $application->id }}, 'rejected')"
                                            class="py-3 bg-zinc-900 border border-zinc-800 text-zinc-500 hover:bg-zinc-800 hover:text-red-500 rounded-xl font-black text-[10px] uppercase tracking-[0.2em] transition-all active:scale-95">
                                            Dismiss
                                        </button>
                                    </div>
                                </div>
                            </div>
                @empty
                    <div
                        class="col-span-full py-32 text-center bg-zinc-800/10 border border-dashed border-zinc-800 rounded-[2rem]">
                        <div
                            class="w-20 h-20 bg-zinc-800 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner">
                            <svg class="w-10 h-10 text-zinc-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2H5a2 2 0 00-2 2v2">
                                </path>
                            </svg>
                        </div>
                        <p class="text-zinc-600 font-black uppercase tracking-widest text-xs">No candidate transmissions
                            detected</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>