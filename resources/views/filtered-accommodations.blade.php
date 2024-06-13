{{--
@extends('layout.layout')

@section('content')
    <h1>Filtered Accommodations</h1>
    @if ($accommodations->isEmpty())
        <p>No accommodations found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Governorate</th>
                    <th>Region</th>
                    <th>Price</th>
                    <th>Images</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accommodations as $accommodation)
                    <tr>
                        <td>{{ $accommodation->description }}</td>
                        <td>{{ $accommodation->governorate }}</td>
                        <td>{{ $accommodation->region }}</td>
                        <td>{{ $accommodation->price }}</td>
                        <td>
                            <img src=" {{ $accommodation->main_image }}" alt="Accommodation Image" class="card-img-top img-fluid">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection --}}
{{-- @if ($accommodations->isEmpty())
    <p>No accommodations found.</p>
@else
    @foreach ($accommodations as $accommodation)
        <p>Description: {{ $accommodation->description }}</p>
        <p>Governorate: {{ $accommodation->governorate }}</p>
        <p>Region: {{ $accommodation->region }}</p>
        <p>Price: {{ $accommodation->price }}</p>
        <p>Image: <img src=" {{ $accommodation->main_image }}" alt="Accommodation Image" width="200" height="150"></p>
    @endforeach
@endif --}}
