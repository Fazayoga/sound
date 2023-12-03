@extends('mainlayout')

@section('maincontent')
    <div class="wrapper">
        <!-- untuk home -->
        <div class="kolom animated"> <!-- Tambahkan kelas 'animated' di sini -->
            <div class="logo">
                <img src="{{ asset('img/sewa/Sewa Sound.png') }}"/>
            </div>
        </div>
        <section id="home">    
            <div class="kolom animated"> <!-- Tambahkan kelas 'animated' di sini -->
                <p class="deskripsi">Sound System Laweyan</p>
                <h2>Information Sound System</h2>
                <p>Melayani jasa persewaan sound system untuk acara kecil-kecilan.</p>
                <p><a href="{{ asset('about') }}" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
            </div>
        </section>

        <!-- untuk courses -->
        <section id="booking">
            <div class="kolom animated"> <!-- Tambahkan kelas 'animated' di sini -->
                <p class="deskripsi">Please to Booking Now</p>
                <h2>Booking Online</h2>
                <p>Untuk Booking secara online, click lebih lanjut</p>
                <p><a href="{{ asset('order') }}" class="tbl-biru">Pelajari Lebih Lanjut</a></p>
            </div>
            <div class="kolom animated">
                <img src="{{ asset('img/logo/order.png') }}"/>
            </div>
            
        </section>

        <!-- untuk partners -->
        <section id="partners">
            <div class="tengah">
                <div class="kolom animated"> <!-- Tambahkan kelas 'animated' di sini -->
                    <p class="deskripsi">Our Top Partners</p>
                    <h2>Partners</h2>
                    <p><img src="{{ asset('img/logo/Logo Laweyan.png') }}"/></p>
                </div>
            </div>
        </section>
    </div>
    <script>
        window.addEventListener('scroll', function () {
            let parallaxElements = document.querySelectorAll('.parallax');
            for (let element of parallaxElements) {
                let scrollPosition = window.scrollY;
                let parallaxSpeed = element.getAttribute('data-parallax-speed') || 1;
                let translateY = scrollPosition * parallaxSpeed;
                element.style.transform = `translateY(${translateY}px)`;
            }
        });
    </script>
@endsection