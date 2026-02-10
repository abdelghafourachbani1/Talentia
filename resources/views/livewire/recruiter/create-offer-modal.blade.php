<div class="fixed z-[100] inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Overlay -->
        <div class="fixed inset-0 bg-black/80 backdrop-blur-md transition-opacity" aria-hidden="true"
            wire:click="closeModal"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div
            class="inline-block align-bottom bg-zinc-900 rounded-[2.5rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full border border-zinc-700 relative">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-orange-500/5 rounded-full blur-3xl pointer-events-none">
            </div>

            <div class="bg-zinc-900 px-8 pt-10 pb-12 relative z-10">
                <div class="flex justify-between items-center mb-10">
                    <h3 class="text-2xl font-black text-white" id="modal-title">
                        {{ $offerId ? 'Update Listing' : 'Establish New Role' }}
                    </h3>
                    <button wire:click="closeModal"
                        class="text-zinc-600 hover:text-orange-500 transition-colors duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form wire:submit.prevent="store" class="space-y-8">
                    <div class="grid grid-cols-1 gap-8">
                        <!-- Title Field -->
                        <div>
                            <label for="title"
                                class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em] mb-3">Position
                                Title</label>
                            <input type="text" id="title" wire:model="title" placeholder="e.g. Senior Product Designer"
                                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300">
                            @error('title') <span
                            class="text-[10px] text-red-500 mt-2 font-black uppercase tracking-widest">{{ $message }}</span>@enderror
                        </div>

                        <!-- Company Field -->
                        <div>
                            <label for="entreprise"
                                class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em] mb-3">Company
                                Name</label>
                            <input type="text" id="entreprise" wire:model="entreprise" placeholder="e.g. Talentia Inc."
                                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300">
                            @error('entreprise') <span
                            class="text-[10px] text-red-500 mt-2 font-black uppercase tracking-widest">{{ $message }}</span>@enderror
                        </div>

                        <!-- Contract Type Field -->
                        <div>
                            <label for="type_contrat"
                                class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em] mb-3">Contract
                                Type</label>
                            <select id="type_contrat" wire:model="type_contrat"
                                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300 appearance-none">
                                <option value="" class="bg-zinc-900">Select employment type</option>
                                <option value="CDI" class="bg-zinc-900">CDI - Permanent</option>
                                <option value="CDD" class="bg-zinc-900">CDD - Fixed Term</option>
                                <option value="Stage" class="bg-zinc-900">Stage - Internship</option>
                                <option value="Freelance" class="bg-zinc-900">Freelance - Project</option>
                            </select>
                            @error('type_contrat') <span
                            class="text-[10px] text-red-500 mt-2 font-black uppercase tracking-widest">{{ $message }}</span>@enderror
                        </div>
                        <!-- Expiration Date Field -->
                        <div>
                            <label for="expires_at"
                                class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em] mb-3">Expiration
                                Date</label>
                            <input type="date" id="expires_at" wire:model="expires_at"
                                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300">
                            @error('expires_at') <span
                            class="text-[10px] text-red-500 mt-2 font-black uppercase tracking-widest">{{ $message }}</span>@enderror
                        </div>

                        <!-- Description Field -->
                        <div>
                            <label for="description"
                                class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em] mb-3">Role
                                Description</label>
                            <textarea id="description" wire:model="description" rows="5"
                                placeholder="Detail the responsibilities and requirements..."
                                class="w-full px-5 py-4 bg-white border-2 border-zinc-200 rounded-2xl text-sm font-bold text-black placeholder:text-zinc-400 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300 resize-none"></textarea>
                            @error('description') <span
                            class="text-[10px] text-red-500 mt-2 font-black uppercase tracking-widest">{{ $message }}</span>@enderror
                        </div>

                        <!-- Image Upload Field -->
                        <div>
                            <label for="image"
                                class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em] mb-3">Branding
                                Image</label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-8 pb-8 border-2 border-zinc-700 border-dashed rounded-2xl hover:border-orange-500/50 transition-all duration-300 bg-zinc-800/20">
                                <div class="space-y-4 text-center">
                                    @if ($image)
                                        <div class="relative inline-block">
                                            <img src="{{ $image->temporaryUrl() }}"
                                                class="mx-auto h-28 w-auto rounded-xl object-cover shadow-2xl">
                                            <div class="absolute inset-0 border border-white/10 rounded-xl"></div>
                                        </div>
                                    @else
                                        <div
                                            class="w-16 h-16 bg-zinc-800 rounded-2xl flex items-center justify-center mx-auto shadow-inner">
                                            <svg class="w-8 h-8 text-zinc-600" stroke="currentColor" fill="none"
                                                viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex text-xs font-bold justify-center">
                                        <label for="image"
                                            class="relative cursor-pointer text-orange-500 hover:text-orange-400 focus-within:outline-none transition-colors">
                                            <span>Transmit File</span>
                                            <input id="image" wire:model="image" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-2 text-zinc-600">or drag and drop</p>
                                    </div>
                                    <p class="text-[10px] text-zinc-700 font-black uppercase tracking-widest">PNG, JPG
                                        up to 2MB</p>
                                </div>
                            </div>
                            @error('image') <span
                            class="text-[10px] text-red-500 mt-2 font-black uppercase tracking-widest">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="flex gap-4 pt-6">
                        <button type="button" wire:click="closeModal"
                            class="flex-1 px-8 py-4 bg-zinc-800 border-2 border-zinc-700 rounded-2xl text-sm font-black text-zinc-400 hover:text-white transition-all duration-300 active:scale-95">
                            Abort
                        </button>
                        <button type="submit"
                            class="flex-1 px-8 py-4 bg-orange-500 border border-transparent rounded-2xl text-sm font-black text-black hover:bg-orange-600 transition-all shadow-xl shadow-orange-500/20 active:scale-95">
                            {{ $offerId ? 'Synchronize Updates' : 'Publish Listing' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>