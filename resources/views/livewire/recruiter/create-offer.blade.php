<div class="py-12 bg-black min-h-screen">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-zinc-900 border border-zinc-800 rounded-[2.5rem] shadow-2xl overflow-hidden relative">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-orange-500/5 rounded-full blur-3xl pointer-events-none">
            </div>

            <div class="p-8 md:p-14 relative z-10">
                <div class="mb-10 flex justify-between items-start">
                    <div>
                        <h3 class="text-3xl font-black text-white mb-2 italic">
                            {{ $id ? 'Refine Listing' : 'Publish New Role' }}</h3>
                        <p class="text-zinc-500 font-bold uppercase tracking-widest text-[10px]">
                            Define the requirements and mission for your next talent acquisition.
                        </p>
                    </div>
                    <a href="{{ route('recruiter.offers') }}"
                        class="text-[10px] font-black text-zinc-600 hover:text-white uppercase tracking-widest transition-colors border-2 border-zinc-800 px-4 py-2 rounded-xl">Back</a>
                </div>

                @if ($errors->any())
                    <div
                        class="mb-10 bg-red-500/10 border border-red-500/20 text-red-500 px-6 py-4 rounded-2xl animate-fade-in">
                        <p class="text-[10px] font-black uppercase tracking-widest mb-2">Transmission Errors Detected:</p>
                        <ul class="list-disc list-inside text-xs font-bold">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form wire:submit="store" class="space-y-8">
                    <div class="grid grid-cols-1 gap-8">
                        <!-- Title -->
                        <div class="space-y-3">
                            <label for="title"
                                class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">Position
                                Title</label>
                            <input wire:model="title" type="text" id="title" placeholder="e.g. Lead Fullstack Engineer"
                                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300">
                            @error('title') <span
                                class="text-[10px] text-red-500 font-black tracking-widest uppercase">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Company -->
                            <div class="space-y-3">
                                <label for="entreprise"
                                    class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">Entreprise</label>
                                <input wire:model="entreprise" type="text" id="entreprise"
                                    placeholder="e.g. Talentia Corp"
                                    class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300">
                                @error('entreprise') <span
                                    class="text-[10px] text-red-500 font-black tracking-widest uppercase">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Contract Type -->
                            <div class="space-y-3">
                                <label for="type_contrat"
                                    class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">Contract
                                    Type</label>
                                <select wire:model="type_contrat" id="type_contrat"
                                    class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300 appearance-none">
                                    <option value="">Select type</option>
                                    <option value="CDI">CDI - Permanent</option>
                                    <option value="CDD">CDD - Fixed Term</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Internship">Internship</option>
                                </select>
                                @error('type_contrat') <span
                                    class="text-[10px] text-red-500 font-black tracking-widest uppercase">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Expiration -->
                        <div class="space-y-3">
                            <label for="expires_at"
                                class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">Application
                                Deadline</label>
                            <input wire:model="expires_at" type="date" id="expires_at"
                                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300">
                            @error('expires_at') <span
                                class="text-[10px] text-red-500 font-black tracking-widest uppercase">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="space-y-3">
                            <label for="description"
                                class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">Role
                                Description</label>
                            <textarea wire:model="description" id="description" rows="6"
                                placeholder="Detail the mission and expectations..."
                                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300 resize-none"></textarea>
                            @error('description') <span
                                class="text-[10px] text-red-500 font-black tracking-widest uppercase">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="space-y-3">
                            <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">Visual
                                Branding {{ $id ? '(Optional)' : '(Required)' }}</label>
                            <div class="flex items-center space-x-6">
                                <div class="relative group">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}"
                                            class="h-32 w-32 rounded-3xl object-cover border-2 border-orange-500 shadow-xl">
                                    @elseif($existingImage)
                                        <img src="{{ asset('storage/' . $existingImage) }}"
                                            class="h-32 w-32 rounded-3xl object-cover border-2 border-zinc-700 shadow-xl">
                                    @else
                                        <div
                                            class="h-32 w-32 rounded-3xl bg-zinc-800 border-2 border-zinc-700 flex items-center justify-center text-zinc-600">
                                            <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <label
                                        class="cursor-pointer bg-zinc-800 border-2 border-zinc-700 hover:border-orange-500/50 hover:bg-zinc-700 px-6 py-3 rounded-xl text-[10px] font-black text-zinc-400 hover:text-white transition-all duration-300 uppercase tracking-widest inline-block">
                                        {{ $image || $existingImage ? 'Change Image' : 'Select Image' }}
                                        <input type="file" wire:model="image" class="hidden">
                                    </label>
                                    <div wire:loading wire:target="image"
                                        class="text-[9px] font-black text-orange-500 mt-2 uppercase tracking-widest animate-pulse">
                                        Transmitting...</div>
                                    @error('image') <span
                                        class="text-[10px] text-red-500 font-black tracking-widest uppercase block mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-10 border-t border-zinc-800 flex justify-end items-center gap-6">
                        <div wire:loading wire:target="store"
                            class="text-[10px] font-black text-orange-500 uppercase tracking-widest animate-pulse">
                            Syncing Hub...</div>
                        <button type="submit"
                            class="px-12 py-5 bg-orange-500 hover:bg-orange-600 text-black rounded-2xl font-black text-sm uppercase tracking-widest transition-all shadow-xl shadow-orange-500/20 active:scale-95">
                            {{ $id ? 'Update Mission' : 'Publish Listing' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>