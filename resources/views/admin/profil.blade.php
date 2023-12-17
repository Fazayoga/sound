@extends('indexlayout')

@section('admincontent')
    <div class="wrapper">
        <div class="kolom animated">
            @foreach($admins as $admin)
            <h2>Nama :</h2>
            <div class="kotak">
                <p>{{ $admin->name }}</p>
            </div>
            
            <h2>Email :</h2>
            <div class="kotak">
                <p>{{ $admin->email }}</p>
            </div>
            @endforeach
            <br><br>
            <a href="{{ asset ('/edit-profil') }}" class="tbl-pink">Edit Profil</a>
        </div>
    </div>
@endsection