@extends('indexlayout')

@section('admincontent')
    <div class="wrapper">
        <h1>Masukkan Testimoni</h1>

        <a href="{{ route('admin.create') }}">Tambah Testimoni</a>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <table border="1">
            <tr>
                <th>Video</th>
                <th>Judul</th>
                <th>Deskripsi</th>
            </tr>
            @forelse($testi as $test)
            <tr>
                <td><video width="320" height="240" controls>
                        <source src="{{ asset($testi->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </td>
                <td>{{ $test->judul }}</td>
                <td>{!! nl2br(e($test->deskripsi)) !!}</td>
                <td>
                    <a href="{{ route('testi.edit-testi', $test->id) }}"><button>Edit</button></a>
                    <form method="POST" action="{{ route('testi.destroy', $test->id) }}" onsubmit="return confirm('Are you sure you want to delete this sound system?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="8">Tidak ada data Testimoni.</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection