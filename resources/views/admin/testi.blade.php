@extends('mainlayout')

@section('maincontent')
    <div class="wrapper">
        <!-- untuk home -->
        <section id="home">
            <div class="kolom">
                <div class="kolom animated"> <!-- Tambahkan kelas 'animated' di sini -->
                    <p class="deskripsi">Sound System Laweyan</p>
                    <h2>Testimoni Persewaan Sound</h2>
                    <h4>“Low Price, Good Quality”</h4>
                    @foreach($testi as $test)
                    <div class="container">
                        <div class="left">
                            <img src="{{ asset($test->gambar) }}" width="200px">
                        </div>
                        <div class="right">
                            <h3>{{ $test->judul }}</h3>
                            <h4>Deskripsi : <br>{!! nl2br(e($test->deskripsi)) !!}</h4>

                            <p><a href="{{ asset('testi/create') }}" class="tbl-biru">Booking Now</a></p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection