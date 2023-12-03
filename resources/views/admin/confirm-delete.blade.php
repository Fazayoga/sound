<!-- resources/views/admin/confirm-delete.blade.php -->

@extends('indexlayout')

@section('admincontent')
<div class="wrapper">
    <h1>Konfirmasi Hapus Sound System</h1>

    <p>Apakah Anda yakin ingin menghapus sound system berikut?</p>

    <div>
        <strong>Sound Code:</strong> {{ $soundSystem->sound_code }}<br>
        <strong>Judul:</strong> {{ $soundSystem->judul }}<br>
        <strong>Deskripsi:</strong> {{ $soundSystem->deskripsi }}<br>
        <!-- Tambahkan kolom-kolom lain yang ingin ditampilkan -->
    </div>

    <a href="{{ route('admin.destroy', $soundSystem->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </a>
</div>
@endsection
