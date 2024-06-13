{{-- @extends('layout.layout')

@section('content')
    <h1>Second Homes</h1>

     <form method="GET" action="{{ route('filter') }}"> should be commented
     <form action="{{ route('filtered-accommodations') }}" method="post"> should be commented

    <form action="{{ route('filtered-accommodations', ['query' => $query]) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="region">Region:</label>
            <input type="text" class="form-control" id="region" name="region" value="{{ request()->input('region') }}">
        </div>
        <div class="form-group">
            <label for="maxPrice">Max Price:</label>
            <input type="number" class="form-control" id="maxPrice" name="maxPrice"
                value="{{ request()->input('maxPrice') }}">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ request()->input('city') }}">
        </div>
        <div class="form-group">
            <label for="type">Type:</label>
            <select class="form-control" id="type" name="type">
                <option value="">All</option>
                <option value="shared" {{ request()->input('type') == 'shared' ? 'selected' : '' }}>Shared</option>
                <option value="individual" {{ request()->input('type') == 'individual' ? 'selected' : '' }}>Individual
                </option>
            </select>
        </div>
         <button type="submit" class="btn btn-primary">Filter</button>  should be commented
        <input type="hidden" name="query" value="{{ $query->toSql() }}">

        <button type="submit">Filter Accommodations</button>
    </form>

    <ul>
         @foreach ($secondHomes as $secondHome) should be commented
            <li>{{ $secondHome->name }} - {{ $secondHome->price }}</li>
        @endforeach
        @foreach ($query as $accommodation)
            <li>{{ $accommodation->description }} - {{ $accommodation->price }}</li>
        @endforeach
    </ul>
@endsection --}}

{{-- @extends('layout.layout')

@section('content') --}}
    <h1>Filter Second Homes</h1>

    <form action="{{ route('filter') }}" method="GET">
        <div class="form-group">
            <label for="region">Region:</label>
            <input type="text" class="form-control" id="region" name="district" value="{{ request('region') }}">
        </div>
        <div class="form-group">
            <label for="maxPrice">Max Price:</label>
            <input type="number" class="form-control" id="maxPrice" name="price" value="{{ request('maxPrice') }}">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ request('city') }}">
        </div>
        <div class="form-group">
            <label for="type">Type:</label>
            <select class="form-control" id="type" name="searchType">
                <option value="">All</option>
                <option value="shared" {{ request('type') === 'shared' ? 'selected' : '' }}>Shared</option>
                <option value="individual" {{ request('type') === 'individual' ? 'selected' : '' }}>Individual</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
{{-- @endsection --}}
