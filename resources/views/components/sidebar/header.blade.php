<div class="flex items-center justify-between flex-shrink-0 px-4 mb-8">
    <!-- Logo Expanded -->
    <a
        href="{{ route('dashboard') }}"
        class="inline-flex items-center gap-3 transition-transform duration-200 hover:scale-105"
        x-show="isSidebarOpen || isSidebarHovered"
    >
        <div class="p-2 bg-white/20 dark:bg-gray-700/30 rounded-xl backdrop-blur-sm">
            <svg class="w-8 h-8 text-white dark:text-gray-100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="10" y="10" width="80" height="80" rx="15" fill="currentColor" fill-opacity="0.2"/>
                <path d="M30 65L35 35L40 65" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                <line x1="32" y1="50" x2="38" y2="50" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                <path d="M55 35V65M55 35H68M55 48H65" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="flex flex-col">
            <span class="text-lg font-bold text-white dark:text-gray-100">K UI</span>
            <span class="text-xs text-blue-100 dark:text-gray-300 font-medium">Dashboard</span>
        </div>
    </a>

    <!-- Logo Compact -->
    <a
        href="{{ route('dashboard') }}"
        class="inline-flex items-center transition-transform duration-200 hover:scale-105"
        x-show="!isSidebarOpen && !isSidebarHovered"
    >
        <div class="p-2 bg-white/20 dark:bg-gray-700/30 rounded-xl backdrop-blur-sm">
            <svg class="w-8 h-8 text-white dark:text-gray-100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="10" y="10" width="80" height="80" rx="15" fill="currentColor" fill-opacity="0.2"/>
                <path d="M30 65L35 35L40 65" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                <line x1="32" y1="50" x2="38" y2="50" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                <path d="M55 35V65M55 35H68M55 48H65" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </a>

    <!-- Toggle Button -->
    <button
        type="button"
        class="p-2 bg-white/10 dark:bg-gray-700/30 hover:bg-white/20 dark:hover:bg-gray-600/40 text-white dark:text-gray-200 border border-white/20 dark:border-gray-600/30 backdrop-blur-sm rounded-lg transition-all duration-200"
        x-show="isSidebarOpen || isSidebarHovered"
        x-on:click="isSidebarOpen = !isSidebarOpen"
    >
        <span class="sr-only">Toggle sidebar</span>
        <!-- Menu Fold Right Icon -->
        <svg x-show="!isSidebarOpen" class="hidden w-5 h-5 lg:block transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>

        <!-- Menu Fold Left Icon -->
        <svg x-show="isSidebarOpen" class="hidden w-5 h-5 lg:block transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>

        <!-- Close Icon -->
        <svg class="w-5 h-5 lg:hidden transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>
