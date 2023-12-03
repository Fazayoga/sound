@extends('indexlayout')

@section('admincontent')
<div class="wrapper">
    <h1>Edit Sound System</h1>

    <form action="{{ route('admin.update', $soundSystem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Form fields for editing -->
        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar">

        <label for="sound_code">Sound Code:</label>
        <input type="text" name="sound_code" value="{{ $soundSystem->sound_code }}" required>

        <label for="judul">Judul:</label>
        <input type="text" name="judul" value="{{ $soundSystem->judul }}" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" required>{{ $soundSystem->deskripsi }}</textarea>

        <label for="harga">Harga:</label>
        <input type="text" name="harga" value="{{ $soundSystem->harga }}" required>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="available" {{ $soundSystem->status === 'available' ? 'selected' : '' }}>Available</option>
            <option value="rented" {{ $soundSystem->status === 'rented' ? 'selected' : '' }}>Rented</option>
        </select>

        <button type="submit">Update Sound System</button>
    </form>
</div>
@endsection
