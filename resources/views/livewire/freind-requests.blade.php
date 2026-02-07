<div>
    <h3>Friend Requests</h3>

    @foreach($requests as $request)
        <div>
            <span>{{ $request->user->name }}</span>
            <button wire:click="accept({{ $request->id }})">Accept</button>
            <button wire:click="refuse({{ $request->id }})">Refuse</button>
        </div>
    @endforeach

    @if(session()->has('success'))
        <span>{{ session('success') }}</span>
    @endif
</div>
