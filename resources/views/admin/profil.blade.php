@extends('indexlayout')

@section('admincontent')
    <div class="wrapper">
        <div class="kolom animated">
            @auth('admin')
            <h2>Nama :</h2>
            <div class="kotak">
                <p>{{ auth('admin')->user()->name }}</p>
            </div>
            
            <h2>Email :</h2>
            <div class="kotak">
                <p>{{ auth('admin')->user()->email }}</p>
            </div>
            @endauth
            <br><br>
            <a href="{{ asset ('/edit-profil') }}" class="tbl-pink">Edit Profil</a>
        </div>
    </div>
@endsection