<div class="py-12 bg-black min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-zinc-900 border border-zinc-800 rounded-[2.5rem] shadow-2xl overflow-hidden relative">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-orange-500/5 rounded-full blur-3xl pointer-events-none">
            </div>

            <div class="md:grid md:grid-cols-3 md:gap-12 p-8 md:p-14 relative z-10">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-2xl font-black text-white mb-2">Profile Intel</h3>
                        <p class="text-zinc-500 font-bold uppercase tracking-widest text-[10px]">
                            Establish your professional baseline to intrigue recruiters.
                        </p>
                    </div>
                </div>

                <div class="mt-8 md:mt-0 md:col-span-2">
                    <form wire:submit="saveProfile" class="space-y-8">
                        @if (session()->has('success'))
                            <div
                                class="bg-orange-500 text-black px-6 py-4 rounded-2xl flex items-center shadow-xl shadow-orange-500/20 animate-fade-in">
                                <svg class="w-6 h-6 mr-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-black uppercase tracking-widest text-xs">{{ session('success') }}</span>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 gap-10">
                            <!-- Job Title -->
                            <div class="space-y-3">
                                <label for="title"
                                    class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">Designation</label>
                                <input wire:model="title" type="text" id="title"
                                    placeholder="e.g. Senior Architecture Specialist"
                                    class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300">
                                @error('title') <span
                                    class="text-[10px] text-red-500 font-black tracking-widest uppercase">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Photo -->
                            <div class="space-y-4">
                                <label
                                    class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">Visual
                                    Identification</label>
                                <div class="flex items-center space-x-8">
                                    <div class="relative group">
                                        @if ($photo)
                                            <img src="{{ $photo->temporaryUrl() }}"
                                                class="h-24 w-24 rounded-3xl object-cover border-2 border-orange-500 shadow-xl shadow-orange-500/10 transition-transform group-hover:scale-105">
                                        @elseif ($existingPhoto)
                                            <img src="{{ asset('storage/' . $existingPhoto) }}"
                                                class="h-24 w-24 rounded-3xl object-cover border-2 border-zinc-700 shadow-xl transition-transform group-hover:scale-105">
                                        @else
                                            <div
                                                class="h-24 w-24 rounded-3xl bg-zinc-800 border-2 border-zinc-700 flex items-center justify-center text-zinc-600 shadow-inner group-hover:border-orange-500/30 transition-colors">
                                                <svg class="h-12 w-12" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <label
                                            class="cursor-pointer bg-zinc-800 border-2 border-zinc-700 hover:border-orange-500/50 hover:bg-zinc-700 px-6 py-3 rounded-xl text-[10px] font-black text-zinc-400 hover:text-white transition-all duration-300 uppercase tracking-widest inline-block active:scale-95">
                                            Update Image
                                            <input type="file" wire:model="photo" class="hidden">
                                        </label>
                                        <div wire:loading wire:target="photo"
                                            class="text-[10px] font-black text-orange-500 mt-2 tracking-widest uppercase animate-pulse">
                                            Transmitting...</div>
                                        @error('photo') <span
                                            class="text-[10px] text-red-500 font-black tracking-widest uppercase block mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Education -->
                            <div class="space-y-3">
                                <label for="formation"
                                    class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">Academic
                                    Lineage</label>
                                <textarea wire:model="formation" id="formation" rows="4"
                                    placeholder="List your degrees and institutions..."
                                    class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300 resize-none"></textarea>
                                @error('formation') <span
                                    class="text-[10px] text-red-500 font-black tracking-widest uppercase">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Experience -->
                            <div class="space-y-3">
                                <label for="experiences"
                                    class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">Professional
                                    Background</label>
                                <textarea wire:model="experiences" id="experiences" rows="4"
                                    placeholder="Detail your previous campaigns..."
                                    class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300 resize-none"></textarea>
                                @error('experiences') <span
                                    class="text-[10px] text-red-500 font-black tracking-widest uppercase">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Skills -->
                            <div class="space-y-3">
                                <label for="competences"
                                    class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">Specialized
                                    Toolset</label>
                                <textarea wire:model="competences" id="competences" rows="4"
                                    placeholder="e.g. Blade Mastery, Design Leadership..."
                                    class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300 resize-none"></textarea>
                                @error('competences') <span
                                    class="text-[10px] text-red-500 font-black tracking-widest uppercase">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-8 border-t border-zinc-800 flex justify-end">
                            <button type="submit"
                                class="px-10 py-5 bg-orange-500 hover:bg-orange-600 text-black rounded-2xl font-black text-sm uppercase tracking-widest transition-all shadow-xl shadow-orange-500/20 active:scale-95">
                                Commit Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>