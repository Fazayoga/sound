@extends('mainlayout')

@section('maincontent')
    <div class="wrapper">
        <!-- untuk home -->
        <div class="logo">
            <img src="{{ asset('img/sewa/Sewa Sound.png') }}"/>
        </div>
        <section id="home">
            <div class="kolom">
                <p class="deskripsi">Sound System Laweyan</p>
                <h2>Information Sound System</h2>
                <p>“Low Price, Good Quality”</p>
                <p>
                    Fazcho Sound System adalah sebuah jasa rental sound system 
                    yang siap memeriahkan setiap acara, moment, dan kebahagiaan anda. 
                    Kami berdiri sejak tahun 2022, tepat pada tanggal 9 September, 2022. 
                </p>
                <p>
                    Melayani berbagai macam acara: <br>
                    - Ulang tahun <br>
                    - Pernikahan <br>
                    - Band Reguler <br>
                    - Perkantor <br>
                    - Dll
                </p>
                <p><b>Location:</b><a href="https://goo.gl/maps/owbAug1mKnT5mB6s9">Fazcho Sound System</a></p>
            </div>
        </section>
    </div>
@endsection