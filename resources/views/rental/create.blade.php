<!-- resources/views/rental/create.blade.php -->

@extends('mainlayout')

@section('maincontent')
<div class="wrapper">
    <h3>Formulir Persewaan Sound System</h3>

    <form method="POST" action="{{ route('rental.store') }}">
        @csrf

        <label for="rental_date">Pilih Tanggal Persewaan:</label>
        <input type="date" id="rental_date" name="rental_date" required>

        <label for="rental_time">Pilih Waktu Persewaan:</label>
        <input type="time" id="rental_time" name="rental_time" required>

        <label for="sound_system_id">Pilih Sound System:</label>
        <select id="sound_system_id" name="sound_system_id" required>
            @foreach ($soundSystems as $soundSystem)
                <option value="{{ $soundSystem->id }}">{{ $soundSystem->judul }}</option>
            @endforeach
        </select>

        <!-- Tambahkan field lainnya sesuai kebutuhan -->

        <button type="submit">Submit</button>
    </form>
</div>
@endsection
