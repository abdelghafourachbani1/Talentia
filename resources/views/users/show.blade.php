<h1>{{ $user->name }}</h1>
<p>Email: {{ $user->email }}</p>
<p>Bio: {{ $user->profile->title ?? 'No title yet' }}</p>

@if(auth()->id() !== $user->id)
    <livewire:friend-button :friend-id="$user->id" />
@endif
