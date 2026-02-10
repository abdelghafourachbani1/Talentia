<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="space-y-10">
    <header>
        <h2 class="text-xl font-black text-white uppercase tracking-widest">
            {{ __('Terminate Account') }}
        </h2>

        <p class="mt-2 text-xs font-bold text-zinc-500 uppercase tracking-widest">
            {{ __('Once your account is deleted, all of its resources and data will be permanently purged. Please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-8 py-4 bg-zinc-800 border-2 border-red-500/30 hover:bg-red-600 text-red-500 hover:text-white rounded-2xl font-black text-xs uppercase tracking-widest transition-all active:scale-95">{{ __('Initiate Termination') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-10 bg-zinc-900 border border-zinc-800 rounded-[2.5rem]">
            <h2 class="text-xl font-black text-white uppercase tracking-widest">
                {{ __('Confirm Termination') }}
            </h2>

            <p class="mt-4 text-xs font-bold text-zinc-500 uppercase tracking-widest leading-relaxed">
                {{ __('Purge sequence is irreversible. Please input your cipher to confirm permanent data removal.') }}
            </p>

            <div class="mt-8 space-y-3">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input wire:model="password" id="password" name="password" type="password"
                    class="w-full px-5 py-4 bg-zinc-800 border-2 border-zinc-700 rounded-2xl text-sm font-bold text-white placeholder:text-zinc-600 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300"
                    placeholder="{{ __('Verification Cipher') }}" />

                <x-input-error class="text-[10px] text-red-500 font-black tracking-widest uppercase mt-2"
                    :messages="$errors->get('password')" />
            </div>

            <div class="mt-10 flex gap-6">
                <button type="button" x-on:click="$dispatch('close')"
                    class="flex-1 px-8 py-4 bg-zinc-800 border-2 border-zinc-700 rounded-2xl text-xs font-black text-zinc-400 hover:text-white transition-all active:scale-95 uppercase tracking-widest">
                    {{ __('Abort') }}
                </button>

                <button type="submit"
                    class="flex-1 px-8 py-4 bg-red-600 hover:bg-red-700 text-white rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-xl shadow-red-600/20 active:scale-95">
                    {{ __('Confirm Purge') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>