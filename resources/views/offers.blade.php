<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-orange-500 leading-tight">
            {{ __('Explore Opportunities') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-14 relative group">
                <div
                    class="absolute -left-10 -top-10 w-40 h-40 bg-orange-500/5 rounded-full blur-3xl pointer-events-none">
                </div>
                <h1 class="text-4xl font-black text-white tracking-tighter mb-4 relative z-10">Available Positions</h1>
                <p class="text-zinc-500 font-bold uppercase tracking-widest text-xs relative z-10">Discover your next
                    career move within our premium network.</p>
                <div class="w-24 h-1.5 bg-orange-500 rounded-full mt-6 relative z-10"></div>
            </div>


            <livewire:job-offers-list />
        </div>
    </div>
</x-app-layout>