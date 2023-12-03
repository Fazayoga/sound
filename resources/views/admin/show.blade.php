@extends('mainlayout')

@section('mainlayout')
    <h1>Sound System Detail</h1>
    <p>ID: {{ $soundSystem->id }}</p>
    <p>Sound Code: {{ $soundSystem->sound_code }}</p>
    <p>Title: {{ $soundSystem->title }}</p>
    <p>Status: {{ $soundSystem->status }}</p>
    <a href="{{ route('admin.index') }}">Back to Sound Systems</a>
@endsection