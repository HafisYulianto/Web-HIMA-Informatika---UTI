<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="/build/assets/img/logo.png" type="image/png">

        <title>Login — HIMA IF Serasi</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-['Inter'] antialiased bg-slate-950 text-slate-200">
        <div class="min-h-screen flex">

            {{-- Left Panel - Branding --}}
            <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">
                {{-- Gradient Background --}}
                <div class="absolute inset-0 bg-gradient-to-br from-red-900 via-red-800 to-orange-700"></div>
                <div class="absolute inset-0 bg-[url('/build/assets/img/hero-bg-2.jpg')] bg-cover bg-center opacity-20 mix-blend-overlay"></div>

                {{-- Content --}}
                <div class="relative z-10 flex flex-col justify-center px-16">
                    <div class="mb-8">
                        <img src="/build/assets/img/logo.png" alt="HIMA IF" class="w-20 h-20 rounded-2xl shadow-2xl shadow-red-500/30 border-2 border-white/20">
                    </div>
                    <h1 class="text-4xl font-extrabold text-white leading-tight mb-4">
                        HIMA<br>Informatika
                    </h1>
                    <p class="text-lg text-red-100/80 max-w-md leading-relaxed">
                        Sistem Serap Aspirasi Mahasiswa — Platform digital untuk menyalurkan aspirasi dan keluhan mahasiswa Informatika.
                    </p>
                    <div class="flex items-center gap-3 mt-8 text-red-200/60 text-sm">
                        <i class="bi bi-geo-alt"></i>
                        <span>Universitas Teknokrat Indonesia</span>
                    </div>
                </div>

                {{-- Decorative elements --}}
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-tl from-orange-500/20 to-transparent rounded-full blur-3xl"></div>
                <div class="absolute top-20 right-10 w-48 h-48 bg-gradient-to-bl from-red-400/10 to-transparent rounded-full blur-2xl"></div>
            </div>

            {{-- Right Panel - Login Form --}}
            <div class="flex-1 flex flex-col justify-center items-center px-6 sm:px-12 lg:px-20">
                <div class="w-full max-w-md">

                    {{-- Mobile Logo --}}
                    <div class="lg:hidden flex justify-center mb-8">
                        <img src="/build/assets/img/logo.png" alt="HIMA IF" class="w-16 h-16 rounded-xl shadow-lg border-2 border-red-500/30">
                    </div>

                    {{-- Header --}}
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-white">Selamat Datang 👋</h2>
                        <p class="text-sm text-slate-400 mt-2">Masuk ke panel admin HIMA IF Serasi</p>
                    </div>

                    {{ $slot }}

                    {{-- Footer --}}
                    <div class="mt-8 text-center">
                        <a href="/" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-300 transition-colors">
                            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
