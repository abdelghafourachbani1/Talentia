<div>
    <button wire:click="sendRequest">Add Friend</button>

    @if(session()->has('success'))
        <span>{{ session('success') }}</span>
    @endif
</div>
