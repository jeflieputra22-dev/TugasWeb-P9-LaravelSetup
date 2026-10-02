@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <h1 class="text-3xl font-bold mb-2">Halo, {{ $nama }}! 👋</h1>
    <p class="text-slate-600 mb-6">Selamat datang di project Laravel pertamaku.</p>

    <h2 class="font-semibold mb-2">Perjalanan belajar web:</h2>
    <ul class="list-disc pl-6 space-y-1">
        @foreach ($courses as $c)
            <li>{{ $c }}</li>
        @endforeach
    </ul>

    <p class="mt-6 text-sm text-slate-500">
        Coba juga: <a class="text-red-600 underline" href="{{ route('hello', 'dunia') }}">/hello/dunia</a>
    </p>
@endsection
