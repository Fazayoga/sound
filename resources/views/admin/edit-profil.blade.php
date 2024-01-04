@extends('indexlayout')

@section('admincontent')
    <div class="wrapper">
        <div class="kolom animated">
            @auth('admin')
                <h2>Edit Profil</h2>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.updateProfile') }}">
                    @csrf
                    @method('PATCH') <!-- Use PATCH method for updating records -->

                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" value="{{ old('name', auth('admin')->user()->name) }}" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email', auth('admin')->user()->email) }}" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">

                    <label for="password_confirmation">Konfirmasi Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">

                    <button type="submit" class="tbl-pink">Simpan Perubahan</button>
                </form>
            @endauth
        </div>
    </div>
@endsection
