<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Tugas P9') — {{ config('app.name') }}</title>
    {{-- Bonus: Tailwind via CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-bold text-red-600">⚡ {{ config('app.name') }}</a>
            <div class="flex gap-4 text-sm">
                @foreach (['home' => 'Home', 'about' => 'About', 'contact' => 'Contact'] as $r => $label)
                    <a href="{{ route($r) }}"
                       class="{{ request()->routeIs($r) ? 'text-red-600 font-semibold' : 'text-slate-600 hover:text-red-600' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-10 flex-1 w-full">
        @yield('content')
    </main>

    <footer class="text-center text-xs text-slate-500 py-6">
        Pemrograman Web · Tugas Rutin 9 · Laravel {{ app()->version() }}
    </footer>
</body>
</html>
