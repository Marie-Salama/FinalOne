<h1>Accommodation Details</h1>

<p>Description: {{ $accommodation->description }}</p>
<p>Address: {{ $accommodation->address }}</p>
<p>Location Link: <a href="{{ $accommodation->location_link }}" target="_blank">{{ $accommodation->location_link }}</a></p><p>Facilities: {{ $accommodation->facilities }}</p>
<p>Governorate: {{ $accommodation->governorate }}</p>
<p>Region: {{ $accommodation->region }}</p>
<p>Price: {{ $accommodation->price }}</p>
<p>Shared or Individual: {{ $accommodation->shared_or_individual }}</p>
<p>Availability: {{ $availability }}</p>

<!-- @if($accommodation->images)
    <h3>Images:</h3>
    <div>
        @foreach($accommodation->images as $image)
        <img src="{{ asset('storage/app/images/' . $image) }}" alt="Accommodation Image">    
            @endforeach
    </div>
@endif -->


@if($images)
    <h3>Images:</h3>
    <div>
        @foreach($images as $image)
        <img src="{{ $image }}" alt="Accommodation Image" style="max-width: 750px; max-height: 650px;">

        @endforeach
    </div>
@endif

<a href="{{ route('rental.index', ['accommodation_id' => $accommodation_id]) }}">Go to Rental Form</a>
