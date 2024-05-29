
    <div class="mt-4 me-5 ms-5">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>receipt</th>
                    <th>user_id</th>
                    <th>user_name</th>
                    <th>accommodation_id</th>
                    <th>accommodation description</th>
                    <th>Confirmed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <td>{{ $rental->id }}</td>
                        <td>{{ $rental->start_date }}</td>
                        <td>{{ $rental->end_date }}</td>
                        <td>{{ $rental->receipt }}</td>
                        <td>{{ $rental->user_id }}</td>
                        {{-- @dd($rental->user->name) --}}
                        <td>{{ $rental->user->name }}</td>
                        <td>{{ $rental->accommodations_id }}</td>
                        <td>{{ $rental->accommodation->description }}</td>
                        <td>{{ $rental->confirmed ? 'Yes' : 'No' }}</td>
                        <td>
                            @if (!$rental->confirmed)
                                <form action="{{ route('rental.confirm', $rental->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Confirm</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

