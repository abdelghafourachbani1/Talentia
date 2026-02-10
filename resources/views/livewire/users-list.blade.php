<div class="space-y-12">
    <!-- Users Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse ($users as $user)
            <div class="bg-white rounded-[2rem] p-8 flex flex-col items-center justify-center space-y-6 transition-all duration-300 hover:scale-[1.02]">
                <!-- User Name -->
                <h3 class="text-2xl font-black text-black tracking-tighter text-center uppercase">
                    {{ $user->name }}
                </h3>
                
                <!-- Action Button -->
                <a href="{{ route('users.show', $user->id) }}" 
                   class="inline-flex items-center justify-center w-full py-4 bg-orange-500 hover:bg-orange-600 rounded-2xl text-[10px] font-black text-black uppercase tracking-[0.2em] transition-all active:scale-95">
                    Show Profile
                </a>
            </div>
        @empty
            <div class="col-span-full py-24 text-center bg-zinc-900 border border-dashed border-zinc-800 rounded-[2rem]">
                <p class="text-zinc-500 font-black uppercase tracking-widest text-[10px]">Registry expansion in progress...</p>
            </div>
        @endforelse
    </div>

    @if($users->hasMorePages())
        <div class="mt-20 text-center pb-20">
            <button wire:click="loadMore"
                class="px-12 py-5 bg-zinc-900 border border-zinc-800 rounded-2xl text-xs font-black text-zinc-400 hover:text-orange-500 hover:border-orange-500/50 transition-all active:scale-95 uppercase tracking-[0.3em]">
                Fetch More Professionals
            </button>
        </div>
    @endif
</div>