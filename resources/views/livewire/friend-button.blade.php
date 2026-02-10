<div class="w-full">
    @if ($status === 'accepted')
        <div
            class="flex items-center justify-center w-full py-3.5 bg-zinc-800 border-2 border-orange-500/20 rounded-xl text-orange-500 font-black text-[10px] uppercase tracking-[0.2em] shadow-lg shadow-orange-500/5 cursor-default group">
            <svg class="w-4 h-4 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
            </svg>
            Synchronized
        </div>
    @elseif ($status === 'pending')
        <div
            class="flex items-center justify-center w-full py-3.5 bg-zinc-800 border-2 border-zinc-700 rounded-xl text-zinc-500 font-black text-[10px] uppercase tracking-[0.2em] cursor-default shadow-inner">
            <svg class="w-4 h-4 mr-2.5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Transmission Pending
        </div>
    @elseif ($status === 'refused')
        <button wire:click="sendRequest"
            class="flex items-center justify-center w-full py-3.5 bg-zinc-900 border-2 border-zinc-700 rounded-xl text-[10px] font-black text-zinc-400 hover:text-orange-500 hover:border-orange-500/50 transition-all duration-300 uppercase tracking-widest active:scale-95 shadow-sm">
            Retry Connection
        </button>
    @else
        <button wire:click="sendRequest"
            class="flex items-center justify-center w-full py-3.5 bg-orange-500 hover:bg-orange-600 border border-transparent rounded-xl text-[10px] font-black text-black transition-all duration-300 uppercase tracking-[0.2em] active:scale-95 shadow-xl shadow-orange-500/20 group">
            <svg class="w-4 h-4 mr-2.5 transform group-hover:scale-110 transition-transform" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            Initiate Contact
        </button>
    @endif

    @if (session()->has('success'))
        <div
            class="mt-3 flex items-center justify-center space-x-2 text-[8px] font-black text-orange-500 uppercase tracking-widest animate-fade-in">
            <span class="w-1 h-1 bg-orange-500 rounded-full animate-ping"></span>
            <span>Request Transmitted Successfully</span>
        </div>
    @endif
</div>