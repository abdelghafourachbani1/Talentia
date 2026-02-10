<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section>
    <header>
        <h2 class="text-xl font-black text-white uppercase tracking-widest">
            {{ __('Update Cipher') }}
        </h2>

        <p class="mt-2 text-xs font-bold text-zinc-500 uppercase tracking-widest">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form wire:submit="updatePassword" class="mt-10 space-y-8">
        <div class="space-y-3">
            <x-input-label for="update_password_current_password" :value="__('Current Password')"
                class="text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]" />
            <x-text-input wire:model="current_password" id="update_password_current_password" name="current_password"
                type="password"
                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300"
                autocomplete="current-password" />
            <x-input-error class="text-[10px] text-red-500 font-black tracking-widest uppercase mt-2"
                :messages="$errors->get('current_password')" />
        </div>

        <div class="space-y-3">
            <x-input-label for="update_password_password" :value="__('New Password')"
                class="text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]" />
            <x-text-input wire:model="password" id="update_password_password" name="password" type="password"
                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300"
                autocomplete="new-password" />
            <x-input-error class="text-[10px] text-red-500 font-black tracking-widest uppercase mt-2"
                :messages="$errors->get('password')" />
        </div>

        <div class="space-y-3">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')"
                class="text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]" />
            <x-text-input wire:model="password_confirmation" id="update_password_password_confirmation"
                name="password_confirmation" type="password"
                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300"
                autocomplete="new-password" />
            <x-input-error class="text-[10px] text-red-500 font-black tracking-widest uppercase mt-2"
                :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="flex items-center gap-6 pt-4">
            <button type="submit"
                class="px-8 py-4 bg-orange-500 hover:bg-orange-600 text-black rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-xl shadow-orange-500/20 active:scale-95">
                {{ __('Encrypt Changes') }}
            </button>

            <x-action-message class="text-[10px] font-black text-green-500 uppercase tracking-widest"
                on="password-updated">
                {{ __('Update Finalized.') }}
            </x-action-message>
        </div>
    </form>
</section>