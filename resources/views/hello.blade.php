@extends('layouts.app')
@section('title', 'Hello')

@section('content')
    <h1 class="text-3xl font-bold mb-2">Hello, {{ $nama }}! 🎉</h1>
    <p class="text-slate-600">Nama ini diambil dari route parameter <code>/hello/{nama}</code>.</p>
@endsection
