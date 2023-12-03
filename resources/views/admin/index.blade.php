@extends('indexlayout')

@section('admincontent')
    <div class="wrapper">
        <h1>Daftar Sound System</h1>

        <a href="{{ route('admin.create') }}">Tambah Sound System</a>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <table border="1">
            <tr>
                <th>Sound Code</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            @forelse($soundSystems as $sound)
            <tr>
                <td>{{ $sound->sound_code }}</td>
                <td><img src="{{ asset($sound->gambar) }}" width="50px"></td>
                <td>{{ $sound->judul }}</td>
                <td>{!! nl2br(e($sound->deskripsi)) !!}</td>
                <td>{{ $sound->harga }}</td>
                <td>{{ $sound->status }}</td>
                <td>
                    <a href="{{ route('admin.edit', $sound->id) }}"><button>Edit</button></a>
                    <form method="POST" action="{{ route('sound-systems.destroy', $sound->id) }}" onsubmit="return confirm('Are you sure you want to delete this sound system?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="8">Tidak ada data sound system.</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection