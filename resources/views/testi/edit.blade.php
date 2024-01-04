@extends('indexlayout')

@section('admincontent')
<div class="wrapper">
    <h1>Edit Testi</h1>

    <form action="{{ route('testi.update-testi', $testi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Form fields for editing -->
        <label for="video">Video:</label>
        <input type="file" name="video">

        <label for="judul">Judul:</label>
        <input type="text" name="judul" value="{{ $testi->judul }}" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" required>{{ $testi->deskripsi }}</textarea>

        <button type="submit">Update Testi</button>
    </form>
</div>
@endsection
