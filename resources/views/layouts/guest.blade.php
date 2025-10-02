<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Kolom Kiri (Branding/Gambar) - Muncul di layar besar -->
        <div class="hidden lg:flex lg:w-1/2 gradient-bg items-center justify-center p-12 text-white relative overflow-hidden">
            <div class="text-center relative z-10 max-w-md">
                <!-- Logo Kustom "KI" -->
                <a href="/" class="inline-block transform hover:scale-110 transition-transform duration-300 mb-8" aria-label="Home">
                    <svg class="w-32 h-32 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
    <!-- Background minimal -->
    <rect x="10" y="10" width="80" height="80" rx="15" fill="#3B82F6" stroke="#1D4ED8" stroke-width="2"/>

    <!-- Huruf A - Clean dan modern -->
    <path d="M30 65L35 35L40 65" stroke="#FFFFFF" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
    <line x1="32" y1="50" x2="38" y2="50" stroke="#FFFFFF" stroke-width="4" stroke-linecap="round"/>

    <!-- Huruf F - Clean dan modern -->
    <path d="M55 35V65M55 35H68M55 48H65" stroke="#FFFFFF" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                </a>
                <h1 class="text-4xl font-bold tracking-tight mb-4">
                    Selamat Datang!
                </h1>
                <p class="text-lg text-blue-100 leading-relaxed mb-8">
                    Satu langkah lagi untuk mengelola keuangan warung Anda dengan lebih mudah dan efisien.
                </p>

                <!-- Features List -->
                <div class="space-y-4 text-left">
                    <div class="flex items-center gap-3 glass-effect rounded-2xl p-4">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center" aria-hidden="true">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="text-blue-100">Pantau pemasukan dan pengeluaran</span>
                    </div>
                    <div class="flex items-center gap-3 glass-effect rounded-2xl p-4">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center" aria-hidden="true">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <span class="text-blue-100">Laporan keuangan otomatis</span>
                    </div>
                    <div class="flex items-center gap-3 glass-effect rounded-2xl p-4">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center" aria-hidden="true">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                        </div>
                        <span class="text-blue-100">Kelola stok barang dengan mudah</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan (Form) - FULL WIDTH -->
        <div class="w-full lg:w-1/2 flex items-center justify-center min-h-screen bg-white">
            <div class="w-full max-w-lg px-8 py-12">
                <!-- Mobile Logo -->
                <div class="lg:hidden mb-8 text-center">
                    <a href="/" class="inline-block" aria-label="Home">
                        <!-- Logo Kustom Mobile "KI" -->
                        <svg class="w-24 h-24 mx-auto" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Huruf K -->
                            <path d="M20 20V80M20 50H45L60 35V20M20 50H45L60 65V80" stroke="#3B82F6" stroke-width="6" stroke-linecap="round"/>
                            <!-- Huruf I -->
                            <path d="M75 20V80M70 20H80M70 80H80" stroke="#3B82F6" stroke-width="6" stroke-linecap="round"/>
                        </svg>
                    </a>
                    <h2 class="mt-4 text-2xl font-bold text-gray-900">
                        KI
                    </h2>
                    <p class="text-gray-600 mt-2">Keuangan Warung</p>
                </div>

                {{ $slot }}

                <!-- Footer Links -->
                <div class="mt-12 pt-8 border-t border-gray-200 text-center">
                    <p class="text-sm text-gray-500">
                        &copy; {{ date('Y') }} KI. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
