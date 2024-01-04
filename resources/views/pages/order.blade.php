@extends('mainlayout')

@section('maincontent')
    <div class="wrapper">
        <!-- untuk home -->
        <section id="home">
            <div class="kolom animated">
                <p class="deskripsi">Sound System Laweyan</p>
                <h2>Rental Sound System & Alat Music</h2>
                <h4>“Low Price, Good Quality”</h4>
                @foreach($soundSystems as $sound)
                <div class="container">
                    <div class="left">
                        <img src="{{ asset($sound->gambar) }}" width="200px">
                    </div>
                    <div class="right">
                        <h3>{{ $sound->judul }}</h3>
                        <h4>Deskripsi : <br>{!! nl2br(e($sound->deskripsi)) !!}</h4>
                        <h4>
                            Harga: {{ $sound->harga }} <br>
                        </h4>
                        <p><a href="{{ asset('rental/create') }}" class="tbl-biru">Booking Now</a></p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection