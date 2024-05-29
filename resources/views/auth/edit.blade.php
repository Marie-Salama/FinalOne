<form method="POST" action="{{ route('accommodations.update', $accommodation->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="description" placeholder="Accommodation Description" value="{{ $accommodation->description }}">
    <input type="text" name="address" placeholder="Accommodation address" value="{{ $accommodation->address }}">
    <input type="text" name="facilities" placeholder="Accommodation facilities" value="{{ $accommodation->facilities }}">
    <input type="text" name="location_link" placeholder="Accommodation location" value="{{ $accommodation->location_link }}">
    <label for="governorate">Governorate:</label>
    <select name="governorate" id="governorate">
        <option value="governorate1" {{ $accommodation->governorate === 'governorate1' ? 'selected' : '' }}>Aswan</option>
        <option value="governorate2" {{ $accommodation->governorate === 'governorate2' ? 'selected' : '' }}>Alexandria</option>
        <!-- Add more options as needed -->
    </select>

    <label for="region">Region:</label>
    <select name="region" id="region">
        <option value="region1" {{ $accommodation->region === 'region1' ? 'selected' : '' }}>Edfu</option>
        <option value="region2" {{ $accommodation->region === 'region2' ? 'selected' : '' }}>Sporting</option>
        <!-- Add more options as needed -->
    </select>
    <input type="text" name="price" placeholder="Accommodation price" value="{{ $accommodation->price }}">
    <input type="file" name="images[]" multiple>
    <div class="shared-or-individual">
        <label for="shared_or_individual">Shared Or Individual Apartment?</label><br>
        <select id="shared_or_individual" name="shared_or_individual">
            <option value="shared" {{ $accommodation->shared_or_individual === 'shared' ? 'selected' : '' }}>Shared</option>
            <option value="individual" {{ $accommodation->shared_or_individual === 'individual' ? 'selected' : '' }}>Individual</option>
        </select>
    </div>
    <button type="submit">Update</button>
</form>
