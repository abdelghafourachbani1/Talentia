<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-orange-500 leading-tight">
            {{ __('Account Settings') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <div
                class="p-8 sm:p-12 bg-zinc-900 border border-zinc-800 shadow-2xl rounded-[2.5rem] relative overflow-hidden">
                <div
                    class="absolute -right-20 -top-20 w-64 h-64 bg-orange-500/5 rounded-full blur-3xl pointer-events-none">
                </div>
                <div class="max-w-xl relative z-10">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div
                class="p-8 sm:p-12 bg-zinc-900 border border-zinc-800 shadow-2xl rounded-[2.5rem] relative overflow-hidden">
                <div
                    class="absolute -left-20 -bottom-20 w-64 h-64 bg-orange-500/5 rounded-full blur-3xl pointer-events-none">
                </div>
                <div class="max-w-xl relative z-10">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div
                class="p-8 sm:p-12 bg-zinc-900 border border-red-500/10 shadow-2xl rounded-[2.5rem] relative overflow-hidden">
                <div class="max-w-xl relative z-10">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>