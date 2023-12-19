@extends('mainlayout')

@section('mainlayout')
    <h1>Testimoni Detail</h1>
    <p>ID: {{ $testi->id }}</p>
    <p>Judul: {{ $testi->judul }}</p>
    <p>Deskripsi: {{ $testi->deskripsi }}</p>
    <a href="{{ route('testi.index') }}">Back to Testimoni</a>
@endsection