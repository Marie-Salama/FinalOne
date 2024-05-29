@foreach($someAccommodations as $accommodation)
    <h2>{{ $accommodation->description }}</h2>
    <p>Address: {{ $accommodation->address }}</p>
    <p>Price: {{ $accommodation->price }}</p>
    <p>Shared or Individual: {{ $accommodation->shared_or_individual }}</p>
    @if(isset($images[$accommodation->id]) && count($images[$accommodation->id]) > 0)
        <h3>Images:</h3>
        <div>
            @foreach($images[$accommodation->id] as $image)
                <img src="{{ $image }}" alt="Accommodation Image" style="max-width: 750px; max-height: 650px;">
            @endforeach
        </div>
    @endif
    <!-- Add more details as needed -->
@endforeach
