<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-orange-500 leading-tight">
            {{ __('Users Directory') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-14 relative group">
                <div
                    class="absolute -left-10 -top-10 w-40 h-40 bg-orange-500/5 rounded-full blur-3xl pointer-events-none">
                </div>
                <h1 class="text-4xl font-black text-white tracking-tighter mb-4 relative z-10 uppercase italic">Central
                    Registry</h1>
                <p class="text-zinc-500 font-black uppercase tracking-widest text-xs relative z-10">Expand your
                    professional synchronization and synergize with the elite.</p>
                <div
                    class="w-24 h-1.5 bg-orange-500 rounded-full mt-6 relative z-10 shadow-[0_0_15px_rgba(249,115,22,0.5)]">
                </div>
            </div>


            <livewire:users-list />
        </div>
    </div>
</x-app-layout>