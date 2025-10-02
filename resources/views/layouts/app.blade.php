<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'K UI') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }

        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .dark .custom-scrollbar::-webkit-scrollbar-track {
            background: #1e293b;
        }

        .dark .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #475569;
        }

        .dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }

        /* Smooth transitions */
        .transition-all-custom {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased h-full">
    <div
        x-data="mainState"
        :class="{ 'dark': isDarkMode }"
        x-on:resize.window="handleWindowResize"
        x-cloak
        class="h-full"
    >
        <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-cyan-50 dark:from-gray-900 dark:via-gray-800 dark:to-blue-900/20 text-gray-900 dark:text-gray-200">

            <!-- Background decorative elements -->
            <div class="fixed inset-0 -z-10 overflow-hidden">
                <div class="absolute -top-40 -right-32 w-80 h-80 bg-blue-200/30 dark:bg-blue-600/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-40 -left-32 w-80 h-80 bg-cyan-200/30 dark:bg-cyan-600/10 rounded-full blur-3xl"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-100/20 dark:bg-blue-500/5 rounded-full blur-3xl"></div>
            </div>

            <!-- Sidebar -->
            <x-sidebar.sidebar />

            <!-- Page Wrapper -->
            <div
                class="flex flex-col min-h-screen transition-all-custom"
                :class="{
                    'lg:ml-64': isSidebarOpen,
                    'md:ml-20': !isSidebarOpen
                }"
            >

                <!-- Navbar -->
                <x-navbar />

                <!-- Page Heading -->
                <header class="relative">
                    <div class="p-4 sm:p-6">
                        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl p-6 border border-white/20 dark:border-gray-700/20 shadow-sm">
                            {{ $header }}
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="px-4 sm:px-6 flex-1 pb-6">
                    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border border-white/20 dark:border-gray-700/20 shadow-sm h-full custom-scrollbar overflow-y-auto">
                        <div class="p-6">
                            {{ $slot }}
                        </div>
                    </div>
                </main>

                <!-- Page Footer -->
                <footer class="px-4 sm:px-6 pb-6">
                    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl p-4 border border-white/20 dark:border-gray-700/20 shadow-sm">
                        <x-footer />
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('mainState', () => ({
                isDarkMode: false,
                isSidebarOpen: window.innerWidth >= 1024,

                init() {
                    // Check for saved theme preference or respect OS preference
                    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                        this.isDarkMode = true;
                        document.documentElement.classList.add('dark');
                    } else {
                        this.isDarkMode = false;
                        document.documentElement.classList.remove('dark');
                    }

                    // Handle responsive sidebar
                    this.handleResponsiveSidebar();
                },

                handleWindowResize() {
                    this.handleResponsiveSidebar();
                },

                handleResponsiveSidebar() {
                    if (window.innerWidth < 1024) {
                        this.isSidebarOpen = false;
                    } else {
                        this.isSidebarOpen = true;
                    }
                },

                toggleDarkMode() {
                    this.isDarkMode = !this.isDarkMode;
                    if (this.isDarkMode) {
                        localStorage.theme = 'dark';
                        document.documentElement.classList.add('dark');
                    } else {
                        localStorage.theme = 'light';
                        document.documentElement.classList.remove('dark');
                    }
                },

                toggleSidebar() {
                    this.isSidebarOpen = !this.isSidebarOpen;
                }
            }));
        });
    </script>
</body>
</html>
