<div class="py-12 bg-black min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-zinc-900 border border-zinc-800 rounded-[2.5rem] shadow-2xl p-8 md:p-12 relative overflow-hidden">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-orange-500/5 rounded-full blur-3xl pointer-events-none">
            </div>

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6 relative z-10">
                <div>
                    <h2 class="text-3xl font-black text-white mb-2 italic">Operation Hub</h2>
                    <p class="text-zinc-500 font-bold uppercase tracking-widest text-[10px]">Manage your active talent
                        acquisitions.</p>
                </div>
                <a href="{{ route('recruiter.offers.create') }}"
                    class="px-8 py-4 bg-orange-500 hover:bg-orange-600 text-black rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-xl shadow-orange-500/20 active:scale-95 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Establish New Role
                </a>
            </div>

            @if (session()->has('message'))
                <div
                    class="mb-10 bg-green-500/10 border border-green-500/20 text-green-500 px-6 py-4 rounded-2xl flex items-center animate-fade-in relative z-10">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                    <span class="text-xs font-black uppercase tracking-widest">{{ session('message') }}</span>
                </div>
            @endif

            <div class="overflow-x-auto relative z-10">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-zinc-800">
                            <th class="pb-6 pt-2 px-4 text-[10px] font-black text-zinc-600 uppercase tracking-[0.3em]">
                                Designation</th>
                            <th class="pb-6 pt-2 px-4 text-[10px] font-black text-zinc-600 uppercase tracking-[0.3em]">
                                Applications</th>
                            <th class="pb-6 pt-2 px-4 text-[10px] font-black text-zinc-600 uppercase tracking-[0.3em]">
                                Status</th>
                            <th class="pb-6 pt-2 px-4 text-[10px] font-black text-zinc-600 uppercase tracking-[0.3em]">
                                Deadline</th>
                            <th
                                class="pb-6 pt-2 px-4 text-[10px] font-black text-zinc-600 uppercase tracking-[0.3em] text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/50">
                        @forelse ($offers as $offer)
                            <tr class="group hover:bg-zinc-800/20 transition-colors">
                                <td class="py-6 px-4">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="w-12 h-12 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center overflow-hidden">
                                            @if ($offer->image)
                                                <img src="{{ asset('storage/' . $offer->image) }}"
                                                    class="w-full h-full object-cover">
                                            @else
                                                <svg class="w-6 h-6 text-zinc-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1v1H9V7zm5 0h1v1h-1V7zm-5 4h1v1H9v-1zm5 0h1v1h-1v-1z" />
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="text-sm font-black text-white group-hover:text-orange-500 transition-colors">
                                                {{ $offer->title }}</div>
                                            <div class="text-[9px] font-bold text-zinc-600 uppercase tracking-widest mt-1">
                                                {{ $offer->entreprise }} • {{ $offer->type_contrat }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-6 px-4">
                                    <span class="text-xs font-black text-white">{{ $offer->applications_count ?? $offer->applications()->count() }}</span>
                                    <span class="text-[9px] font-bold text-zinc-600 uppercase tracking-widest ml-1">Candidates</span>
                                </td>
                                <td class="py-6 px-4">
                                    <span
                                        class="inline-flex items-center px-4 py-1.5 text-[10px] font-black rounded-full uppercase tracking-[0.2em] {{ $offer->status === 'active' ? 'bg-green-500/10 text-green-500 border border-green-500/20' : 'bg-zinc-800 text-zinc-600 border border-zinc-700' }}">
                                        {{ $offer->status }}
                                    </span>
                                </td>
                                <td class="py-6 px-4">
                                    <span class="text-[10px] font-black text-zinc-400 uppercase tracking-widest">
                                        {{ $offer->expires_at ? \Carbon\Carbon::parse($offer->expires_at)->format('d M, Y') : 'N/A' }}
                                    </span>
                                </td>
                                <td class="py-6 px-4 text-right">
                                    <div class="flex items-center justify-end space-x-3">
                                        <a href="{{ route('recruiter.offers.applications', $offer->id) }}"
                                            class="p-2.5 text-zinc-500 hover:text-white hover:bg-zinc-800 rounded-xl transition-all duration-300"
                                            title="View Intel">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 01-2 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 00-2-2z" />
                                            </svg>
                                        </a>
                                        <button wire:click="toggleStatus({{ $offer->id }})"
                                            class="inline-flex items-center space-x-2 px-4 py-2 bg-zinc-800 text-zinc-500 hover:text-orange-500 rounded-xl transition-all duration-300 border border-zinc-700 hover:border-orange-500/30"
                                            title="{{ $offer->status === 'active' ? 'Close Listing' : 'Open Listing' }}">
                                            @if($offer->status === 'active')
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="text-[9px] font-black uppercase tracking-widest">Close Offer</span>
                                            @else
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="text-[9px] font-black uppercase tracking-widest">Reopen</span>
                                            @endif
                                        </button>
                                        <button wire:click="confirmDelete({{ $offer->id }})"
                                            class="p-2.5 text-zinc-500 hover:text-red-500 hover:bg-zinc-800 rounded-xl transition-all duration-300"
                                            title="Purge Listing">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-32 text-center">
                                    <div
                                        class="w-24 h-24 bg-zinc-800 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner">
                                        <svg class="w-12 h-12 text-zinc-700" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2zM9 17h6v-2H9v2zm0-4h6v-2H9v2zm0-4h6V7H9v2z" />
                                        </svg>
                                    </div>
                                    <p class="text-zinc-500 font-bold uppercase tracking-widest text-xs">No listings
                                        established yet</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-12">
                {{ $offers->links() }}
            </div>
        </div>
    </div>

    <!-- Deletion Confirmation Modal -->
    @if($confirmingDeletion)
        <div class="fixed z-[100] inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-black/80 backdrop-blur-md transition-opacity" aria-hidden="true"
                    wire:click="$set('confirmingDeletion', false)"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-zinc-900 rounded-[2rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-zinc-800">
                    <div class="bg-zinc-900 px-8 pt-10 pb-12">
                        <div class="w-20 h-20 bg-red-500/10 rounded-[1.5rem] flex items-center justify-center mb-8 mx-auto">
                            <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-3 text-center">Terminate Listing?</h3>
                        <p class="text-zinc-500 text-center font-medium mb-10 leading-relaxed px-4">This action is
                            irreversible. All applications associated with this list will be purged from the mainframe.</p>

                        <div class="flex gap-4">
                            <button wire:click="$set('confirmingDeletion', false)"
                                class="flex-1 px-8 py-4 bg-zinc-800 border border-zinc-700 rounded-2xl text-sm font-black text-zinc-400 hover:text-white transition-all active:scale-95">
                                Keep Listing
                            </button>
                            <button wire:click="delete()"
                                class="flex-1 px-8 py-4 bg-red-600 border border-transparent rounded-2xl text-sm font-black text-white hover:bg-red-700 transition-all shadow-xl shadow-red-600/20 active:scale-95">
                                Delete Listing
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>