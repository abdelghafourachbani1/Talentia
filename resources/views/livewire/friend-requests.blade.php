<div class="space-y-4">
    @forelse ($requests as $request)
        <div
            class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100 hover:border-indigo-100 transition-colors">
            <div class="flex items-center space-x-3">
                <div
                    class="flex-shrink-0 w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold text-sm">
                    {{ substr($request->user->name, 0, 1) }}
                </div>
                <div>
                    <h5 class="text-sm font-bold text-gray-900 leading-none">{{ $request->user->name }}</h5>
                    <p class="text-xs text-gray-500 mt-1">Sent a connection request</p>
                </div>
            </div>
            <div class="flex space-x-2">
                <button wire:click="accept({{ $request->id }})"
                    class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors" title="Accept">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </button>
                <button wire:click="refuse({{ $request->id }})"
                    class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Decline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    @empty
        <div class="text-center py-6">
            <div class="text-gray-300 mb-2">
                <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
            </div>
            <p class="text-sm text-gray-400">No pending requests</p>
        </div>
    @endforelse
</div>