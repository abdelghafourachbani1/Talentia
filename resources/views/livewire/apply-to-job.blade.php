<div class="w-full">
    @if (session()->has('success'))
        <div
            class="flex items-center justify-center space-x-3 py-5 px-6 bg-orange-500 rounded-2xl text-black font-black animate-fade-in shadow-xl shadow-orange-500/20">
            <svg class="w-6 h-6 animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="uppercase tracking-widest text-xs">Application Sent</span>
        </div>
    @else
        <button wire:click="apply" wire:loading.attr="disabled"
            class="group relative w-full flex items-center justify-center py-5 px-8 bg-orange-500 hover:bg-orange-600 disabled:opacity-50 text-black rounded-2xl font-black text-lg transition-all duration-300 shadow-lg shadow-orange-500/20 hover:shadow-orange-500/40 active:scale-95">
            <span wire:loading.remove class="uppercase tracking-widest">Apply for this Role</span>
            <span wire:loading class="uppercase tracking-widest">Processing...</span>
            <svg wire:loading.remove
                class="w-6 h-6 ml-3 transform group-hover:translate-x-2 transition-transform duration-300" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z">
                </path>
            </svg>
        </button>
    @endif
</div>