@extends('indexlayout')

@section('admincontent')
    <div class="wrapper">
        <div class="kolom animated">
            <h2>Nama :</h2>
            <div class="kotak">
                <p>Faza Yoga Ardana</p>
            </div>

            <h2>Alamat :</h2>
            <div class="kotak">
                <p>Gang Latar Ireng V No 5 RT 03/02 Bumi, Laweyan, Solo</p>
            </div>
            
            <h2>Email :</h2>
            <div class="kotak">
                <p>fazayoga23@gmail.com</p>
            </div>

            <h2>No Telp :</h2>
            <div class="kotak">
                <p>0895397988422</p>
            </div>
            <br><br>
            <a href="{{ asset ('/edit-profil') }}" class="tbl-pink">Edit Profil</a>
        </div>
    </div>
@endsection