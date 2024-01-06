<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazcho Sound System</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <nav>
            <div class="wrapper">
                <div class="logo"><a href="{{ asset('index') }}">Fazcho Sound System</a></div>
                <div class="menu">
                    <ul>
                        <li><a href="{{ asset('index') }}">Home</a></li>
                        <li><a href="{{ asset('order') }}">Booking</a></li>
                        <li><a href="{{ asset('jadwal') }}">Schedule</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="{{ asset('akun') }}">Profil</a></li>
                        @auth('web')
                            <!-- Tampilan untuk pengguna yang sudah login -->
                            <li>
                                <form method="POST" action="{{ route('logout-user') }}">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        @else
                            <!-- Tampilan untuk pengguna yang belum login -->
                            <li><a href="{{ asset('login') }}">Login</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
