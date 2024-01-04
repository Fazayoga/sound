<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazcho Sound System</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <header>
        <nav>
            <div class="wrapper">
                <div class="logo"><a href="{{ asset('home') }}">Fazcho Sound System</a></div>
                <div class="menu">
                    <ul>
                        <li><a href="{{ asset('home') }}">Home</a></li>
                        <li><a href="{{ asset('profil') }}">Profil</a></li>
                        <li><a href="{{ asset('sound_systems') }}">Post</a></li>
                        <!-- <li><a href="{{ asset('testi') }}">Tested</a></li> -->
                        <li><a href="{{ asset('rental') }}">Booked</a></li>
                        @auth('admin')
                            <!-- Tampilan untuk pengguna yang sudah login -->
                            <li>
                                <form method="POST" action="{{ route('logout-admin') }}">
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