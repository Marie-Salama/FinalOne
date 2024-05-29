@foreach($accommodations as $accommodation)
    <h2>Accommodation ID: {{ $accommodation->id }}</h2>
    @if($accommodation->main_image)
        <h3>Main Image:</h3>
        <div>
            <img src="{{ asset('storage/' . $accommodation->main_image) }}" alt="Accommodation Image" style="max-width: 750px; max-height: 650px;">
        </div>
    @else
        <p>No main image available for this accommodation.</p>
    @endif 
@endforeach
