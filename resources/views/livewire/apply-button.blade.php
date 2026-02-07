<div>
    <button wire:click="apply">
        Apply to Job
    </button>

    @if(session()->has('success'))
        <p>{{ session('success') }}</p>
    @endif
</div>
