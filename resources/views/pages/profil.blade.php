@extends('mainlayout')

@section('maincontent')    
    <div class="wrapper">
        <div class="kolom animated">
            @auth('web')
            <h3>Nama :</h3>
            <div class="kotak">
                <p>{{ auth('web')->user()->name }}</p>
            </div>
            
            <h3>Email :</h3>
            <div class="kotak">
                <p>{{ auth('web')->user()->email }}</p>
            </div>
            @endauth
            <br><br>
            <a href="{{ asset ('/edit-akun') }}" class="tbl-pink">Edit Profil</a>
            <br><br><br>
        </div>
    </div>
@endsection