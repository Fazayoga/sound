@extends('indexlayout')

@section('admincontent')
<div class="wrapper">
    @auth('admin')
        <h2>Selamat Datang, {{ auth('admin')->user()->name }}!</h2>
    @endauth
</div>
@endsection
