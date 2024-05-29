<form method="POST" action="{{ route('accommodation.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="description" placeholder="Accommodation Description" value="{{ old('description') }}">
    <input type="text" name="address" placeholder="Accommodation address" value="{{ old('address') }}">
    <input type="text" name="facilities" placeholder="Accommodation facilities" value="{{ old('facilities') }}">
    <input type="text" name="location_link" placeholder="Accommodation location" value="{{ old('location_link') }}">
    <label for="governorate">Governorate:</label>
    <select name="governorate" id="governorate">Seheil Island
        <option value="governorate1">Governorate 1</option>
        <option value="governorate2">Governorate 2</option>
        <option value="Aswan">Aswan</option>
        <!-- Add more options as needed -->
    </select>

    <label for="region">Region:</label>
    <select name="region" id="region">
        <option value="region1">Region 1</option>
        <option value="region2">Region 2</option>
        <option value="Edfu">Edfu</option>
        <!-- Add more options as needed -->
    </select>
    <input type="text" name="price" placeholder="Accommodation price" value="{{ old('price') }}"><br>
    main image
    <input type="file" name="main_image"  accept="image/*"><br>
    acco images
    <input type="file" name="images[]" multiple>
    <input type="number" name="no_of_tenants" placeholder="Number of Tenants" value="{{ old('no_of_tenants') }}" required>
    <div class="shared-or-individual">
        <label for="shared_or_individual">Shared Or Individual Apartment?</label><br>
        <select id="shared_or_individual" name="shared_or_individual">
    <option value="shared" <?php echo (old('shared_or_individual') == 'shared' || is_array(old('shared_or_individual'))) ? 'selected' : ''; ?>>Shared</option>
    <option value="individual" <?php echo (old('shared_or_individual') == 'individual' || is_array(old('shared_or_individual'))) ? 'selected' : ''; ?>>Individual</option>
</select>


    </div>
    <button type="submit">Submit</button>
</form>
