{{-- mariam added it --}}

@php
    $accommodation = App\Models\Accommodation::find(request('accommodation_id'));
@endphp

<form action="{{ route('store.rental') }}" method="POST">
@csrf
<input type="hidden" name="user_id" value="{{ Auth::id() }}">
@if ($accommodation)
    <input type="hidden" name="accommodation_id" value="{{ $accommodation_id }}">
    
@else
    <!-- Handle the case where accommodation is not found -->
    <p>Accommodation not found</p>
@endif

    <label for="img">Select image:</label>
    <input type="file" id="img" name="img" accept="image/*">
    <label for="reference number">reference number:</label>
    <input type="number" id="reference number" name="reference_number" value=" ">
    <label for="end">End date:</label>
    <input type="date" id="end" name="end_date" value=" " min="" max="">
    <button type="submit">Submit</button">
</form>

