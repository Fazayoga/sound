<!-- resources/views/rental/index.blade.php -->

@extends('indexlayout')

@section('admincontent')
<div class="wrapper">
    <div class="wrapper">
        <h1>Rental Schedule</h1>

        <table border="1">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Event Name</th>
                    <th>Event Address</th>
                    <th>Location Name</th>
                    <th>Sound System</th>
                    <th>Rental Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Additional Description</th>
                    <th>Images</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rentals as $rental)
                <tr>
                    <td>{{ $rental->customer_name }}</td>
                    <td>{{ $rental->event_name }}</td>
                    <td>{{ $rental->event_address }}</td>
                    <td>{{ $rental->name_location }}</td>
                    <td>{{ $rental->soundSystem->judul }}</td>
                    <td>{{ $rental->rental_date }}</td>
                    <td>{{ $rental->rental_start_time }}</td>
                    <td>{{ $rental->rental_end_time }}</td>
                    <td>{{ $rental->deskripsi }}</td>
                    <td><img src="{{ asset($rental->soundSystem->gambar) }}" width="100px" height="100px"></td>
                    <td>
                        <a href="{{ route('rental.edit', $rental->id) }}"><button>Edit</button></a>
                        <form method="POST" action="{{ route('rental.destroy', $rental->id) }}" onsubmit="return confirm('Are you sure you want to delete this sound system?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
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
