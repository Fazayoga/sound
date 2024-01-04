@extends('mainlayout')

@section('maincontent')
<div class="wrapper">
    <h3>Formulir Persewaan Sound System</h3>

    <form method="POST" action="{{ route('rental.store') }}">
        @csrf

        @auth('web')
        <label for="customer_name">Customer Name:</label>
        <input type="text" name="customer_name" id="customer_name" placeholder="Nama Pelanggan" value="{{ auth('web')->user()->name }}" required readonly>
        @endauth
        <label for="event_name">Event Name:</label>
        <input type="text" name="event_name" id="event_name" placeholder="Nama Acara" required>
        
        <label for="name_location">Name Location:</label>
        <input type="text" name="name_location" id="name_location" placeholder="Alamat Lokasi" required>
        
        <label for="event_address">Event Address:</label>
        <input type="text" name="event_address" id="event_address" placeholder="Alamat Lengkap" required>

        <label for="sound_system_id">Sound System:</label>
        <select name="sound_system_id" id="sound_system_id">
            @foreach ($soundSystems as $soundSystem)
                <option value="{{ $soundSystem->id }}">{{ $soundSystem->judul }}</option>
            @endforeach
        </select>

        <label for="rental_date">Rental Date:</label>
        <input type="date" name="rental_date" id="rental_date" required>

        <label for="rental_start_time">Rental Start Time:</label>
        <input type="time" name="rental_start_time" id="rental_start_time" required>

        <label for="rental_end_time">Rental End Time:</label>
        <input type="time" name="rental_end_time" id="rental_end_time" required>

        <label for="deskripsi">Additional Description:</label>
        <textarea name="deskripsi" id="deskripsi" placeholder="Tambahkan keterangan apa saja yang dibutuhkan" rows="4"></textarea>

        <form method="POST" action="{{ route('rental.konfirmasi') }}">
            @csrf
            <!-- Your WhatsApp confirmation form fields and submit button here -->
            <button type="submit">Submit</button>
        </form>
    </form>
</div>
@endsection
