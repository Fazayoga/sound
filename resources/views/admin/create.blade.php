@extends('indexlayout')

@section('admincontent')
<div class="wrapper">
    <h1>Tambah Sound System</h1>

    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar">
        @error('gambar')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="sound_code">Sound Code:</label>
        <input type="text" name="sound_code">
        @error('sound_code')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="judul">Judul:</label>
        <input type="text" name="judul">
        @error('judul')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi"></textarea>
        @error('deskripsi')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="harga">Harga:</label>
        <input type="number" name="harga">
        @error('harga')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="status">Status:</label>
        <select name="status">
            <option value="available">Available</option>
            <option value="rented">Rented</option>
        </select>
        @error('status')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <button type="submit">Submit</button>
    </form>
</div>
@endsection