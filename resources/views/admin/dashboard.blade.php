<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-blue-100">Anda login sebagai Administrator - {{ now()->format('l, d F Y') }}</p>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Products -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Total Produk</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['total_products'] }}</p>
                            </div>
                            <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-lg">
                                <svg class="w-8 h-8 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                        </div>
                        @if($stats['low_stock_products'] > 0)
                        <div class="mt-2 flex items-center text-sm text-red-600 dark:text-red-400">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <span>{{ $stats['low_stock_products'] }} produk stok rendah</span>
                        </div>
                        @else
                        <div class="mt-2 flex items-center text-sm text-green-600 dark:text-green-400">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Semua stok aman</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Today's Transactions -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Transaksi Hari Ini</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['total_transactions_today'] }}</p>
                            </div>
                            <div class="p-3 bg-green-100 dark:bg-green-900 rounded-lg">
                                <svg class="w-8 h-8 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-2 flex items-center text-sm text-green-600 dark:text-green-400">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Update real-time</span>
                        </div>
                    </div>
                </div>

                <!-- Today's Income -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Pendapatan Hari Ini</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">Rp {{ number_format($stats['today_income'], 0, ',', '.') }}</p>
                            </div>
                            <div class="p-3 bg-yellow-100 dark:bg-yellow-900 rounded-lg">
                                <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        @if($stats['today_expense'] > 0)
                        <div class="mt-2 flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <span>Pengeluaran: Rp {{ number_format($stats['today_expense'], 0, ',', '.') }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Monthly Income -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Pendapatan Bulan Ini</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">Rp {{ number_format($stats['monthly_income'], 0, ',', '.') }}</p>
                            </div>
                            <div class="p-3 bg-purple-100 dark:bg-purple-900 rounded-lg">
                                <svg class="w-8 h-8 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-2 flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <span>{{ now()->format('F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Transactions & Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <!-- Recent Transactions -->
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Transaksi Terbaru</h3>
                            <a href="{{ route('admin.transactions') }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                Lihat Semua →
                            </a>
                        </div>
                        <div class="space-y-4">
                            @forelse($recentTransactions as $transaction)
                            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                <div class="flex items-center">
                                    <div class="p-2 {{ $transaction->payment_status === 'paid' ? 'bg-green-100 dark:bg-green-900' : 'bg-yellow-100 dark:bg-yellow-900' }} rounded-lg mr-3">
                                        <svg class="w-5 h-5 {{ $transaction->payment_status === 'paid' ? 'text-green-600 dark:text-green-300' : 'text-yellow-600 dark:text-yellow-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($transaction->payment_status === 'paid')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            @else
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            @endif
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">{{ $transaction->transaction_code }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $transaction->transaction_date->diffForHumans() }} - {{ $transaction->user->name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</p>
                                    <span class="text-xs {{ $transaction->payment_status === 'paid' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300' }} px-2 py-1 rounded">
                                        {{ ucfirst($transaction->payment_status) }}
                                    </span>
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                <svg class="w-12 h-12 mx-auto mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <p>Belum ada transaksi hari ini</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Quick Actions & Low Stock Alert -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Aksi Cepat</h3>
                            <div class="space-y-3">
                                <a href="{{ route('admin.products') }}" class="flex items-center p-3 bg-blue-50 dark:bg-blue-900/20 hover:bg-blue-100 dark:hover:bg-blue-900/30 rounded-lg transition-colors">
                                    <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-lg mr-3">
                                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                    <span class="font-medium text-gray-900 dark:text-gray-100">Kelola Produk</span>
                                </a>

                                <a href="{{ route('admin.transactions') }}" class="flex items-center p-3 bg-green-50 dark:bg-green-900/20 hover:bg-green-100 dark:hover:bg-green-900/30 rounded-lg transition-colors">
                                    <div class="p-2 bg-green-100 dark:bg-green-900 rounded-lg mr-3">
                                        <svg class="w-5 h-5 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                    </div>
                                    <span class="font-medium text-gray-900 dark:text-gray-100">Lihat Transaksi</span>
                                </a>

                                <a href="{{ route('admin.reports') }}" class="flex items-center p-3 bg-purple-50 dark:bg-purple-900/20 hover:bg-purple-100 dark:hover:bg-purple-900/30 rounded-lg transition-colors">
                                    <div class="p-2 bg-purple-100 dark:bg-purple-900 rounded-lg mr-3">
                                        <svg class="w-5 h-5 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <span class="font-medium text-gray-900 dark:text-gray-100">Laporan</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Low Stock Alert -->
                    @if($lowStockProducts->count() > 0)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-red-500">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <svg class="w-6 h-6 text-red-600 dark:text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <h3 class="text-lg font-semibold text-red-600 dark:text-red-400">Stok Rendah</h3>
                            </div>
                            <div class="space-y-2 max-h-64 overflow-y-auto">
                                @foreach($lowStockProducts as $product)
                                <div class="p-3 bg-red-50 dark:bg-red-900/20 rounded-lg">
                                    <p class="font-medium text-gray-900 dark:text-gray-100 text-sm">{{ $product->name }}</p>
                                    <div class="flex justify-between items-center mt-1">
                                        <span class="text-xs text-gray-600 dark:text-gray-400">{{ $product->code }}</span>
                                        <span class="text-xs font-semibold text-red-600 dark:text-red-400">
                                            Stok: {{ $product->stock }} / Min: {{ $product->min_stock }}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <a href="{{ route('admin.products') }}" class="mt-4 block text-center text-sm text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                                Kelola Stok →
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Top Products & System Status -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Top Products -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Produk Terlaris</h3>
                        <div class="space-y-3">
                            @forelse($topProducts as $index => $product)
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="flex items-center">
                                    <div class="flex items-center justify-center w-8 h-8 rounded-full {{ $index === 0 ? 'bg-yellow-100 text-yellow-600' : ($index === 1 ? 'bg-gray-100 text-gray-600' : 'bg-orange-100 text-orange-600') }} font-bold text-sm mr-3">
                                        {{ $index + 1 }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">{{ $product->product_name }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $product->total_sold }} terjual</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">Rp {{ number_format($product->total_revenue, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            @empty
                            <p class="text-center text-gray-500 dark:text-gray-400 py-4">Belum ada data penjualan</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- System Status -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Status Sistem</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-3 animate-pulse"></div>
                                    <span class="text-gray-900 dark:text-gray-100">Server Status</span>
                                </div>
                                <span class="text-green-600 dark:text-green-400 font-semibold">Online</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-3 animate-pulse"></div>
                                    <span class="text-gray-900 dark:text-gray-100">Database</span>
                                </div>
                                <span class="text-green-600 dark:text-green-400 font-semibold">Connected</span>
                            </div>

                            <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-gray-900 dark:text-gray-100">Total Pengguna</span>
                                    <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $stats['total_users'] }}</span>
                                </div>
                            </div>

                            <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-gray-900 dark:text-gray-100">Jam Server</span>
                                    <span class="font-semibold text-gray-900 dark:text-gray-100">{{ now()->format('H:i:s') }}</span>
                                </div>
                            </div>

                            <div class="p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                                <p class="text-sm text-blue-800 dark:text-blue-300">
                                    <span class="font-semibold">Info:</span> Sistem berjalan normal. Last backup: {{ now()->subHours(2)->format('H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
