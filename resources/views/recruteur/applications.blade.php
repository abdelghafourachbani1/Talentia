<h2>Applications Received</h2>

@foreach ($offers as $offer)
    <h3>{{ $offer->title }}</h3>

    @foreach ($offer->applications as $application)
        <p>
            Candidate ID: {{ $application->user->id }} |
            Status: {{ $application->status }}
        </p>
    @endforeach
@endforeach
