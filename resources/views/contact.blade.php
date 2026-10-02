@extends('layouts.app')
@section('title', 'Contact')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Kontak</h1>

    <ul class="space-y-3">
        @foreach ($kontak as $platform => $nilai)
            <li class="bg-white rounded-lg border border-slate-200 px-4 py-3">
                <span class="font-medium text-slate-500">{{ $platform }}:</span>
                {{ $nilai }}
            </li>
        @endforeach
    </ul>
@endsection
