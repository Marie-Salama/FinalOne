<div class="card-header">My Accommodations</div>

<div class="card-body">
    @foreach ($accommodations as $accommodation)
        <div class="mb-4">
            <br>
            @foreach ($images[$accommodation->id] ?? [] as $image)
                <img src="{{ $image }}" alt="Accommodation Image" class="img-fluid" style="max-width: 750px; max-height: 650px;">
            @endforeach

                        <p>{{ $accommodation->address }}</p>
            <p>{{ Str::limit($accommodation->description, 100) }}</p>
            <p>Price: {{ $accommodation->price }}</p>
            <p>Availability: {{ $accommodation->availability }}</p>
            <p>Facilities: {{ $accommodation->facilities }}</p>
            <p>Shared or Individual: {{ $accommodation->shared_or_individual }}</p>
            <p>Location Link: {{ $accommodation->location_link }}</p>
            <p>Governorate: {{ $accommodation->governorate }}</p>
            <p>Region: {{ $accommodation->region }}</p>
            <a href="{{ route('accommodations.edit', $accommodation->id) }}" class="btn btn-primary">Edit</a>
            <!-- <a href="#" class="btn btn-primary">View Details</a> -->

            <form method="POST" action="{{ route('accommodations.destroy', $accommodation->id) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this accommodation?')">Delete</button>
            </form>
        </div>
    @endforeach
</div>
