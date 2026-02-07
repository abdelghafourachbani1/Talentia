<div>

<h2>Create Offer</h2>

<input type="text" wire:model="title" placeholder="title">
<textarea wire:model="description"></textarea>
<input type="text" wire:model="type_contrat">
<input type="text" wire:model="entreprise">
<input type="file" wire:model="image">

<button wire:click="save">Save</button>

<hr>

<h2>My Offers</h2>

@foreach($offers as $offer)
<div>
    <h4>{{ $offer->title }}</h4>
    <p>Status: {{ $offer->status }}</p>

    <button wire:click="edit({{ $offer->id }})">Edit</button>
    <button wire:click="close({{ $offer->id }})">Close</button>
</div>
@endforeach

</div>
