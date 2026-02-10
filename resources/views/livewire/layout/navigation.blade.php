<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/login', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-black border-b border-orange-500/20">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate class="transition-transform hover:scale-105">
                        <x-application-logo class="block h-10 w-auto fill-current text-orange-500" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate
                        class="text-gray-300 hover:text-orange-500 active:text-orange-500">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('profile.form')" :active="request()->routeIs('profile.form')" wire:navigate
                        class="text-gray-300 hover:text-orange-500 active:text-orange-500">
                        {{ __('Complete Profile') }}
                    </x-nav-link>

                    <x-nav-link :href="route('offers.index')" :active="request()->routeIs('offers.index')" wire:navigate
                        class="text-gray-300 hover:text-orange-500 active:text-orange-500">
                        {{ __('Offers') }}
                    </x-nav-link>

                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')" wire:navigate
                        class="text-gray-300 hover:text-orange-500 active:text-orange-500">
                        {{ __('Users') }}
                    </x-nav-link>

                    @role('recruiter')
                    <x-nav-link :href="route('recruiter.offers')" :active="request()->routeIs('recruiter.offers')"
                        wire:navigate class="text-gray-300 hover:text-orange-500 active:text-orange-500">
                        {{ __('Manage Offers') }}
                    </x-nav-link>

                    <x-nav-link :href="route('recruiter.offers.create')"
                        :active="request()->routeIs('recruiter.offers.create')" wire:navigate
                        class="text-orange-500 hover:text-white transition-colors uppercase tracking-widest text-[10px] font-black italic">
                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Create Offer
                    </x-nav-link>
                    @endrole
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-400 bg-black hover:text-orange-500 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-orange-500 hover:bg-gray-900 focus:outline-none focus:bg-gray-900 focus:text-orange-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-black">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate
                class="text-gray-300 hover:text-orange-500 active:text-orange-500">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('profile.form')" :active="request()->routeIs('profile.form')"
                wire:navigate class="text-gray-300 hover:text-orange-500 active:text-orange-500">
                {{ __('Complete Profile') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('offers.index')" :active="request()->routeIs('offers.index')"
                wire:navigate class="text-gray-300 hover:text-orange-500 active:text-orange-500">
                {{ __('Offers') }}
            </x-responsive-nav-link>

            @role('recruiter')
            <x-responsive-nav-link :href="route('recruiter.offers')" :active="request()->routeIs('recruiter.offers')"
                wire:navigate class="text-gray-300 hover:text-orange-500 active:text-orange-500">
                {{ __('Manage Offers') }}
            </x-responsive-nav-link>
            @endrole
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-800">
            <div class="px-4">
                <div class="font-medium text-base text-gray-200"
                    x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                    x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-400">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>