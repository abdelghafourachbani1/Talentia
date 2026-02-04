<div>
    <h2>Job Offers</h2>

    @foreach ($offers as $offer)
        <div>
            <h3>
                <a href="{{ route('job.offers.show', $offer->id) }}">
                    {{ $offer->title }}
                </a>
            </h3>
            <p>{{ $offer->entreprise }} – {{ $offer->type_contrat }}</p>
        </div>
        <hr>
    @endforeach

    <button wire:click="loadMore">
        Load more
    </button>
</div>
