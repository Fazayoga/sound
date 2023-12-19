@extends('indexlayout')

@section('admincontent')
<div class="wrapper">
    <h1>Tambah Sound System</h1>

    <form method="POST" action="{{ route('testi.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar">
        @error('gambar')
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

        <button type="submit">Submit</button>
    </form>
</div>
@endsection