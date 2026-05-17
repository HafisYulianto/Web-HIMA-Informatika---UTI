<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMA IF Serasi - Admin</title>
    <link rel="icon" href="/build/assets/img/logo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-200 font-['Inter']">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <main class="flex-1 ml-72 p-8">
            {{-- Top Bar --}}
            <div class="flex items-center justify-between mb-8">
                <div>
                    <p class="text-sm text-slate-400">Selamat datang,</p>
                    <h2 class="text-xl font-bold text-white">{{ Auth::user()->name ?? 'Admin' }}</h2>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-slate-400">{{ now()->translatedFormat('l, d F Y') }}</span>
                    <img src="/build/assets/img/logo.png" alt="Logo" class="w-10 h-10 rounded-full object-cover border-2 border-slate-700">
                </div>
            </div>

            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>
