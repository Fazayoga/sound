@extends('mainlayout')

@section('maincontent')
    <div class="wrapper">
        <h2>Rental Schedule</h2>

        <table border="1">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Sound System</th>
                    <th>Images</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rentals as $rental)
                <tr>
                    <td>{{ $rental->rental_date }}</td>
                    <td>{{ $rental->rental_start_time }}</td>
                    <td>{{ $rental->rental_end_time }}</td>
                    <td>{{ $rental->soundSystem->judul }}</td>
                    <td><img src="{{ asset($rental->soundSystem->gambar) }}" width="200px" height="200px"></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No rental schedules available.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection