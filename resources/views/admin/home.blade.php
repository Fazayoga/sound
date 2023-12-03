@extends('indexlayout')

@section('admincontent')
<div class="wrapper">
    @foreach($admins as $admin)
    <h2>Selamat Datang, {{ $admin->name }} !</h2>
    @endforeach
</div>
@endsection
