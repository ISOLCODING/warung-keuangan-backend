<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-2 px-4"
>
    <!-- Admin Navigation -->
    @auth
        @if(auth()->user()->hasRole('admin'))
            <!-- Main Navigation for Admin -->
            <x-sidebar.link
                title="Dashboard Admin"
                href="{{ route('admin.dashboard') }}"
                :isActive="request()->routeIs('admin.dashboard')"
                class="!bg-blue-600 hover:!bg-blue-700 !text-white !border-blue-500 transition-all duration-200 hover:translate-x-1"
            >
                <x-slot name="icon">
                    <div class="p-1.5 bg-white/20 rounded-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                </x-slot>
            </x-sidebar.link>

            <x-sidebar.link
                title="Manajemen Produk"
                href="{{ route('admin.products') }}"
                :isActive="request()->routeIs('admin.products*')"
                class="!text-gray-800 dark:!text-gray-200 hover:!bg-blue-50 dark:hover:!bg-gray-700 !border-transparent transition-all duration-200 hover:translate-x-1"
            >
                <x-slot name="icon">
                    <div class="p-1.5 bg-blue-100 dark:bg-blue-900 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                </x-slot>
            </x-sidebar.link>

            <x-sidebar.link
                title="Transaksi"
                href="{{ route('admin.transactions') }}"
                :isActive="request()->routeIs('admin.transactions*')"
                class="!text-gray-800 dark:!text-gray-200 hover:!bg-green-50 dark:hover:!bg-gray-700 !border-transparent transition-all duration-200 hover:translate-x-1"
            >
                <x-slot name="icon">
                    <div class="p-1.5 bg-green-100 dark:bg-green-900 rounded-lg">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </x-slot>
            </x-sidebar.link>

            <x-sidebar.link
                title="Laporan"
                href="{{ route('admin.reports') }}"
                :isActive="request()->routeIs('admin.reports*')"
                class="!text-gray-800 dark:!text-gray-200 hover:!bg-purple-50 dark:hover:!bg-gray-700 !border-transparent transition-all duration-200 hover:translate-x-1"
            >
                <x-slot name="icon">
                    <div class="p-1.5 bg-purple-100 dark:bg-purple-900 rounded-lg">
                        <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                </x-slot>
            </x-sidebar.link>

            <x-sidebar.link
                title="Manajemen User"
                href="#"
                :isActive="request()->routeIs('admin.users*')"
                class="!text-gray-800 dark:!text-gray-200 hover:!bg-indigo-50 dark:hover:!bg-gray-700 !border-transparent transition-all duration-200 hover:translate-x-1"
            >
                <x-slot name="icon">
                    <div class="p-1.5 bg-indigo-100 dark:bg-indigo-900 rounded-lg">
                        <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                    </div>
                </x-slot>
            </x-sidebar.link>

        @elseif(auth()->user()->hasRole('kasir'))
            <!-- Navigation for Kasir -->
            <x-sidebar.link
                title="POS Kasir"
                href="{{ route('kasir.pos') }}"
                :isActive="request()->routeIs('kasir.pos')"
                class="!bg-green-600 hover:!bg-green-700 !text-white !border-green-500 transition-all duration-200 hover:translate-x-1"
            >
                <x-slot name="icon">
                    <div class="p-1.5 bg-white/20 rounded-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                </x-slot>
            </x-sidebar.link>

            <x-sidebar.link
                title="Transaksi Saya"
                href="{{ route('kasir.transactions') }}"
                :isActive="request()->routeIs('kasir.transactions')"
                class="!text-gray-800 dark:!text-gray-200 hover:!bg-green-50 dark:hover:!bg-gray-700 !border-transparent transition-all duration-200 hover:translate-x-1"
            >
                <x-slot name="icon">
                    <div class="p-1.5 bg-green-100 dark:bg-green-900 rounded-lg">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </x-slot>
            </x-sidebar.link>

            <x-sidebar.link
                title="Daftar Produk"
                href="#"
                :isActive="request()->routeIs('kasir.products')"
                class="!text-gray-800 dark:!text-gray-200 hover:!bg-blue-50 dark:hover:!bg-gray-700 !border-transparent transition-all duration-200 hover:translate-x-1"
            >
                <x-slot name="icon">
                    <div class="p-1.5 bg-blue-100 dark:bg-blue-900 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                </x-slot>
            </x-sidebar.link>
        @endif

        <!-- Common Navigation for All Roles -->
        <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
            <x-sidebar.link
                title="Profile"
                href="{{ route('profile.edit') }}"
                :isActive="request()->routeIs('profile.edit')"
                class="!text-gray-800 dark:!text-gray-200 hover:!bg-gray-100 dark:hover:!bg-gray-700 !border-transparent transition-all duration-200 hover:translate-x-1"
            >
                <x-slot name="icon">
                    <div class="p-1.5 bg-gray-100 dark:bg-gray-700 rounded-lg">
                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                </x-slot>
            </x-sidebar.link>
        </div>
    @endauth
</x-perfect-scrollbar>
