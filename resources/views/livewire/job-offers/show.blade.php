<h1>{{ $offer->title }}</h1>
<p>{{ $offer->description }}</p>
<p>Type: {{ $offer->type_contrat }}</p>
<p>Company: {{ $offer->entreprise }}</p>

@if($offer->image)
    <img src="{{ asset('storage/' . $offer->image) }}" width="200">
@endif

<hr>

<livewire:apply-button :job-offer-id="$offer->id" />
