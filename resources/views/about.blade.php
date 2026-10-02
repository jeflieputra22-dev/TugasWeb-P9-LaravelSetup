@extends('layouts.app')
@section('title', 'About')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Tentang Saya</h1>

    <dl class="bg-white rounded-lg border border-slate-200 divide-y divide-slate-100 mb-6">
        @foreach ($profil as $label => $isi)
            <div class="flex px-4 py-3">
                <dt class="w-40 font-medium text-slate-500">{{ $label }}</dt>
                <dd>{{ $isi }}</dd>
            </div>
        @endforeach
    </dl>

    <h2 class="font-semibold mb-2">Skill</h2>
    <div class="flex flex-wrap gap-2">
        @foreach ($skills as $s)
            <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-700">{{ $s }}</span>
        @endforeach
    </div>
@endsection
