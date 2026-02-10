<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-xl font-black text-white uppercase tracking-widest">
            {{ __('Profile Intel') }}
        </h2>

        <p class="mt-2 text-xs font-bold text-zinc-500 uppercase tracking-widest">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-10 space-y-8">
        <div class="space-y-3">
            <x-input-label for="name" :value="__('Name')"
                class="text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]" />
            <x-text-input wire:model="name" id="name" name="name" type="text"
                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300"
                required autofocus autocomplete="name" />
            <x-input-error class="text-[10px] text-red-500 font-black tracking-widest uppercase mt-2"
                :messages="$errors->get('name')" />
        </div>

        <div class="space-y-3">
            <x-input-label for="email" :value="__('Email')"
                class="text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]" />
            <x-text-input wire:model="email" id="email" name="email" type="email"
                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300"
                required autocomplete="username" />
            <x-input-error class="text-[10px] text-red-500 font-black tracking-widest uppercase mt-2"
                :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-3 text-zinc-400 font-bold">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification"
                            class="underline text-orange-500 hover:text-orange-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-black text-[10px] text-green-500 uppercase tracking-widest">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-6 pt-4">
            <button type="submit"
                class="px-8 py-4 bg-orange-500 hover:bg-orange-600 text-black rounded-2xl font-black text-xs uppercase tracking-widest transition-all shadow-xl shadow-orange-500/20 active:scale-95">
                {{ __('Save Changes') }}
            </button>

            <x-action-message class="text-[10px] font-black text-green-500 uppercase tracking-widest"
                on="profile-updated">
                {{ __('Update Transmitted.') }}
            </x-action-message>
        </div>
    </form>
</section>