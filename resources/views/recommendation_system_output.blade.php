@extends('layouts.layout')

@section('content')
    <!-- recommendations.blade.php -->
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
    {{-- <ul>
        @foreach ($accommodations as $accommodation)
            <li>{{ $accommodation->id }} - {{ $accommodation->governorate }}</li>
        @endforeach
    </ul> --}}
    <h1>Filtered Accommodations</h1>
    {{-- @dd( $accommodations->images ) --}}
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
                <!-- <th>Images</th>
                <th>Details</th> -->
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
                    <!-- <td>{{ $accommodation->images[0] }}</td> -->
                    {{-- <td>
                @foreach ($accommodation->images as $image)
                    <img src="{{ $image }}" alt="Accommodation Image">
                @endforeach
            </td> --}}
                    {{-- <td>
                        @if (!empty($accommodation->images))
                            <img src="{{ $accommodation->images[0] }}">
                        @else
                            No image available.
                        @endif
                    </td>
                    <td> --}}
                        {{-- @if (!empty($accommodation->images))
                    @foreach ($accommodation->images as $image)
                        <img src="{{ $image }}" alt="Accommodation Image">
                    @endforeach
                @else
                    No images available.
                @endif --}}

                        {{-- {{$images[1]}} done --}}
                    <!-- </td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection