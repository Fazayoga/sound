<!-- resources/views/rental/index.blade.php -->

@extends('indexlayout')

@section('admincontent')
<div class="wrapper">
    <h2>Daftar Persewaan</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal Persewaan</th>
                <th>Waktu Persewaan</th>
                <th>Sound System</th>
                <!-- Tambahkan kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @forelse ($rentals as $rental)
                <tr>
                    <td>{{ $rental->id }}</td>
                    <td>{{ $rental->rental_date }}</td>
                    <td>{{ $rental->rental_time }}</td>
                    <td>{{ $rental->soundSystem->judul }}</td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            @empty
                <tr>
                    <td colspan="3">Tidak ada data persewaan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
