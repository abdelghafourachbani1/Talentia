<div>
    <h2>My Profile</h2>

    <form wire:submit.prevent="saveProfile" enctype="multipart/form-data">
        <div>
            <label>Job Title</label>
            <input type="text" wire:model="title">
            @error('title') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Formation (Education)</label>
            <textarea wire:model="formation"></textarea>
            @error('formation') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Experiences</label>
            <textarea wire:model="experiences"></textarea>
            @error('experiences') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Skills / Competences</label>
            <textarea wire:model="competences"></textarea>
            @error('competences') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Profile Photo</label>
            <input type="file" wire:model="photo">
            @error('photo') <span>{{ $message }}</span> @enderror

            
        </div>

        <button type="submit">Save Profile</button>
    </form>
</div>
