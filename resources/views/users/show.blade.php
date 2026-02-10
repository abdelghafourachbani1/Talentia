<x-app-layout>
    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-900 border border-zinc-800 rounded-[2.5rem] shadow-2xl overflow-hidden relative">
                <div
                    class="absolute -right-20 -top-20 w-64 h-64 bg-orange-500/5 rounded-full blur-3xl p-1 pointer-events-none">
                </div>

                <!-- Header / Banner -->
                <div class="h-32 bg-orange-500 relative">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/20 to-transparent"></div>
                </div>

                <div class="px-8 md:px-14 pb-14 relative z-10">
                    <!-- Profile Header -->
                    <div class="relative flex flex-col md:flex-row md:items-end md:justify-between -mt-16 mb-16 gap-8">
                        <div class="flex flex-col md:flex-row md:items-end gap-8">
                            <div
                                class="w-40 h-40 bg-zinc-900 p-1.5 rounded-[2rem] shadow-2xl border-4 border-zinc-900 flex-shrink-0 group overflow-hidden">
                                @if($user->profile && $user->profile->photo)
                                    <img src="{{ asset('storage/' . $user->profile->photo) }}"
                                        class="w-full h-full rounded-[1.5rem] object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-zinc-800 rounded-[1.5rem] flex items-center justify-center text-orange-500/30">
                                        <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="mb-4">
                                <h1 class="text-4xl font-black text-white leading-tight tracking-tighter">
                                    {{ $user->name }}</h1>
                                <p class="text-orange-500 font-black text-xs uppercase tracking-[0.2em] mt-2">
                                    {{ $user->profile->title ?? 'Independent Professional' }}
                                </p>
                                <div
                                    class="flex items-center text-xs text-zinc-500 font-bold mt-4 bg-zinc-800/50 inline-flex px-4 py-2 rounded-xl border border-zinc-800">
                                    <svg class="w-4 h-4 mr-2 text-orange-500/70" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $user->email }}
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($user->profile)
                        <div class="grid grid-cols-1 gap-16">
                            <!-- Education Section -->
                            <section>
                                <div class="flex items-center space-x-4 mb-8">
                                    <div class="w-1.5 bg-orange-500 h-8 rounded-full"></div>
                                    <h2 class="text-xs font-black text-zinc-500 uppercase tracking-[0.3em]">Academic Lineage
                                    </h2>
                                </div>
                                <div
                                    class="bg-zinc-800/30 rounded-3xl p-8 border border-zinc-800 text-zinc-300 leading-relaxed text-lg font-medium">
                                    {!! nl2br(e($user->profile->formation)) !!}
                                </div>
                            </section>

                            <!-- Experiences Section -->
                            <section>
                                <div class="flex items-center space-x-4 mb-8">
                                    <div
                                        class="w-1.5 bg-orange-500/50 h-8 rounded-full shadow-[0_0_15px_rgba(249,115,22,0.5)]">
                                    </div>
                                    <h2 class="text-xs font-black text-zinc-500 uppercase tracking-[0.3em]">Professional
                                        Campaigns</h2>
                                </div>
                                <div
                                    class="bg-zinc-800/30 rounded-3xl p-8 border border-zinc-800 text-zinc-300 leading-relaxed text-lg font-medium">
                                    {!! nl2br(e($user->profile->experiences)) !!}
                                </div>
                            </section>

                            <!-- Skills Section -->
                            <section>
                                <div class="flex items-center space-x-4 mb-8">
                                    <div class="w-1.5 bg-orange-500/30 h-8 rounded-full"></div>
                                    <h2 class="text-xs font-black text-zinc-500 uppercase tracking-[0.3em]">Specialized
                                        Toolset</h2>
                                </div>
                                <div class="flex flex-wrap gap-3">
                                    @foreach(explode(',', $user->profile->competences) as $skill)
                                        <span
                                            class="px-6 py-3 bg-zinc-800 border-2 border-zinc-700 rounded-2xl text-xs font-black text-zinc-400 uppercase tracking-widest hover:border-orange-500/50 hover:text-white transition-all duration-300 shadow-sm">
                                            {{ trim($skill) }}
                                        </span>
                                    @endforeach
                                </div>
                            </section>

                            <!-- Networking Action -->
                            @if(auth()->id() !== $user->id)
                                <section class="pt-8 border-t border-zinc-800">
                                    <div class="max-w-xs mx-auto">
                                        <livewire:friend-button :friendId="$user->id" />
                                    </div>
                                </section>
                            @endif
                        </div>
                    @else
                        <div class="text-center py-24 bg-zinc-800/10 rounded-[2rem] border border-dashed border-zinc-800">
                            <p class="text-zinc-600 font-black uppercase tracking-widest text-xs">Profile synchronisation
                                incomplete</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>