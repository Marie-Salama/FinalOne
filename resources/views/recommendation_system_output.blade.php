{{-- @extends('layouts.layout')

@section('content')
    <h1>recommendation system output</h1>
    <ul>
        @foreach ($recommendations as $recommendation)
            <li type="1">{{ $recommendation }}</li>
        @endforeach
    </ul>
    <h1>accommodations recommendations</h1>
    @if ($accommodations->isEmpty())
    <p>No accommodations found.</p>
@else

    <h1>Filtered Accommodations</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Address</th>
                <th>Location Link</th>
                <th>Governorate</th>
                <th>Region</th>
                <th>Price</th>
                <th>Shared or Individual</th>
                <th>No. of Tenants</th>
                <th>No. of Tenants Available</th>
                <th>Facilities</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($accommodations as $accommodation)
                <tr>
                    <td>{{ $accommodation->id }}</td>
                    <td>{{ $accommodation->description }}</td>
                    <td>{{ $accommodation->address }}</td>
                    <td>{{ $accommodation->location_link }}</td>
                    <td>{{ $accommodation->governorate }}</td>
                    <td>{{ $accommodation->region }}</td>
                    <td>{{ $accommodation->price }}</td>
                    <td>{{ $accommodation->shared_or_individual }}</td>
                    <td>{{ $accommodation->no_of_tenants }}</td>
                    <td>{{ $accommodation->no_of_tenants_available }}</td>
                    <td>{{ $accommodation->facilities }}</td>
                    {{ $accommodation->images[0] }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection --}}

@if ($accommodations->isEmpty())
    <p>No accommodations found.</p>
@else
    @foreach ($accommodations as $accommodation)
        <p>Description: {{ $accommodation->description }}</p>
        <p>Governorate: {{ $accommodation->governorate }}</p>
        <p>Region: {{ $accommodation->region }}</p>
        <p>Price: {{ $accommodation->price }}</p>
        <p>Image: <img src=" {{ $accommodation->main_image }}" alt="Accommodation Image" width="200" height="150"></p>
    @endforeach
@endif
